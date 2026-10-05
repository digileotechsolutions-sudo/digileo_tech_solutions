<?php
require_once __DIR__ . '/../db.php';

$allowedOrigin = rtrim(defined('SITE_URL') ? SITE_URL : '', '/');
header('Access-Control-Allow-Origin: ' . $allowedOrigin);
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }

$action = $_GET['action'] ?? '';

if ($action === 'send') {
  $data = json_decode(file_get_contents('php://input'), true);
  $message = trim($data['message'] ?? '');
  $contactName = trim($data['name'] ?? '');
  $contactEmail = trim($data['email'] ?? '');
  $contactPhone = trim($data['phone'] ?? '');
  $inquiry = trim($data['inquiry'] ?? '');

  if (!$message) jsonResponse(['error' => 'Message is required'], 400);

  $conversationId = $data['conversation_id'] ?? null;

  if (!$conversationId) {
    $stmt = $pdo->prepare("INSERT INTO conversations (contact_name, contact_email, contact_phone, inquiry, source, status) VALUES (?, ?, ?, ?, 'website', 'active')");
    $stmt->execute([$contactName ?: null, $contactEmail ?: null, $contactPhone ?: null, $inquiry ?: null]);
    $conversationId = $pdo->lastInsertId();

    $welcome = getSetting('welcome_message') ?: 'Hello 👋 Welcome to our website. How can we help you today?';
    $stmt = $pdo->prepare("INSERT INTO messages (conversation_id, sender_type, message) VALUES (?, 'ai', ?)");
    $stmt->execute([$conversationId, $welcome]);

    $stmt = $pdo->prepare("INSERT INTO analytics (event_type, event_data, conversation_id) VALUES ('new_conversation', ?, ?)");
    $stmt->execute([json_encode(['source' => 'website']), $conversationId]);
  }

  $stmt = $pdo->prepare("INSERT INTO messages (conversation_id, sender_type, message) VALUES (?, 'visitor', ?)");
  $stmt->execute([$conversationId, $message]);

  $aiEnabled = getSetting('ai_enabled') === 'true';
  $aiReply = null;

  if ($aiEnabled) {
    $faqMatch = matchFAQ($pdo, $message);
    if ($faqMatch) {
      $aiReply = $faqMatch;
    } else {
      $aiReply = getAIResponse($pdo, $message);
    }

    $stmt = $pdo->prepare("INSERT INTO messages (conversation_id, sender_type, message) VALUES (?, 'ai', ?)");
    $stmt->execute([$conversationId, $aiReply]);

    $stmt = $pdo->prepare("UPDATE conversations SET status = 'waiting' WHERE id = ?");
    $stmt->execute([$conversationId]);

    $autoAssign = getSetting('auto_assign_agent');
    if ($autoAssign === 'true') {
      $stmt = $pdo->prepare("SELECT id FROM agents WHERE status = 'online' LIMIT 1");
      $stmt->execute();
      $agent = $stmt->fetch();
      if ($agent) {
        $stmt = $pdo->prepare("UPDATE conversations SET agent_id = ?, assigned_at = NOW() WHERE id = ?");
        $stmt->execute([$agent['id'], $conversationId]);
        $stmt = $pdo->prepare("INSERT INTO notifications (agent_id, title, message) VALUES (?, 'New conversation assigned', ?)");
        $stmt->execute([$agent['id'], "Conversation #{$conversationId} has been assigned to you."]);
      }
    }
  } else {
    $stmt = $pdo->prepare("UPDATE conversations SET status = 'waiting' WHERE id = ?");
    $stmt->execute([$conversationId]);
  }

  $stmt = $pdo->prepare("SELECT * FROM messages WHERE conversation_id = ? ORDER BY created_at ASC");
  $stmt->execute([$conversationId]);
  $messages = $stmt->fetchAll();

  jsonResponse(['conversation_id' => $conversationId, 'messages' => $messages, 'ai_reply' => $aiReply]);
}

if ($action === 'history') {
  $conversationId = (int)($_GET['conversation_id'] ?? 0);
  if (!$conversationId) jsonResponse(['error' => 'Conversation ID required'], 400);

  $stmt = $pdo->prepare("SELECT * FROM messages WHERE conversation_id = ? ORDER BY created_at ASC");
  $stmt->execute([$conversationId]);
  $messages = $stmt->fetchAll();

  $stmt = $pdo->prepare("SELECT * FROM conversations WHERE id = ?");
  $stmt->execute([$conversationId]);
  $conversation = $stmt->fetch();

  jsonResponse(['conversation' => $conversation, 'messages' => $messages]);
}

if ($action === 'faqs') {
  $stmt = $pdo->prepare("SELECT * FROM faqs WHERE is_active = 1 ORDER BY category, id");
  $stmt->execute();
  $faqs = $stmt->fetchAll();

  $grouped = [];
  foreach ($faqs as $faq) {
    $grouped[$faq['category']][] = $faq;
  }
  jsonResponse(['faqs' => $faqs, 'grouped' => $grouped]);
}

if ($action === 'status') {
  $stmt = $pdo->prepare("SELECT status FROM agents WHERE role = 'admin' OR status = 'online' LIMIT 1");
  $stmt->execute();
  $agent = $stmt->fetch();
  $status = $agent ? $agent['status'] : 'offline';

  $aiEnabled = getSetting('ai_enabled') === 'true';

  jsonResponse([
    'agent_status' => $status,
    'ai_enabled' => $aiEnabled,
    'business_name' => getSetting('business_name'),
    'welcome_message' => getSetting('welcome_message'),
    'offline_message' => getSetting('offline_message'),
    'whatsapp_number' => getSetting('whatsapp_number'),
  ]);
}

if ($action === 'upload') {
  if (!isset($_FILES['file'])) jsonResponse(['error' => 'No file uploaded'], 400);
  $file = $_FILES['file'];
  $allowed = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx'];
  $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
  if (!in_array($ext, $allowed)) jsonResponse(['error' => 'File type not allowed'], 400);

  $convId = (int)($_POST['conversation_id'] ?? 0);
  $filename = uniqid() . '.' . $ext;
  $dest = __DIR__ . '/../uploads/' . $filename;
  move_uploaded_file($file['tmp_name'], $dest);

  $fileUrl = SITE_URL . '/whatsapp-chat/uploads/' . $filename;
  $type = in_array($ext, ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : ($ext === 'pdf' ? 'pdf' : 'file');

  if ($convId) {
    $stmt = $pdo->prepare("INSERT INTO messages (conversation_id, sender_type, message_type, file_url, message) VALUES (?, 'visitor', ?, ?, ?)");
    $stmt->execute([$convId, $type, $fileUrl, 'Uploaded a file']);
  }

  jsonResponse(['file_url' => $fileUrl, 'type' => $type]);
}

if ($action === 'lead') {
  $data = json_decode(file_get_contents('php://input'), true);
  $convId = (int)($data['conversation_id'] ?? 0);
  $name = trim($data['name'] ?? '');
  $email = trim($data['email'] ?? '');
  $phone = trim($data['phone'] ?? '');
  $inquiry = trim($data['inquiry'] ?? '');

  if ($convId) {
    $stmt = $pdo->prepare("UPDATE conversations SET contact_name = ?, contact_email = ?, contact_phone = ?, inquiry = ? WHERE id = ?");
    $stmt->execute([$name ?: null, $email ?: null, $phone ?: null, $inquiry ?: null, $convId]);
  }

  jsonResponse(['success' => true]);
}

function matchFAQ($pdo, $message) {
  $stmt = $pdo->prepare("SELECT * FROM faqs WHERE is_active = 1");
  $stmt->execute();
  $faqs = $stmt->fetchAll();
  $message = strtolower($message);

  $bestMatch = null;
  $bestScore = 0;

  foreach ($faqs as $faq) {
    $keywords = explode(' ', strtolower($faq['question']));
    $score = 0;
    foreach ($keywords as $word) {
      if (strlen($word) > 2 && strpos($message, $word) !== false) {
        $score++;
      }
    }
    if ($score > $bestScore) {
      $bestScore = $score;
      $bestMatch = $faq['answer'];
    }
  }

  return $bestScore >= 2 ? $bestMatch : null;
}

function getAIResponse($pdo, $message) {
  $apiKey = getSetting('openai_api_key');
  if (!$apiKey) return "Thank you for your message. A team member will get back to you shortly.";

  $faqs = $pdo->query("SELECT question, answer FROM faqs WHERE is_active = 1")->fetchAll();
  $faqContext = "Here are the frequently asked questions and answers:\n";
  foreach ($faqs as $faq) {
    $faqContext .= "Q: {$faq['question']}\nA: {$faq['answer']}\n\n";
  }

  $businessInfo = "Business: " . getSetting('business_name') . "\n";
  $businessInfo .= "WhatsApp: " . getSetting('whatsapp_number') . "\n";
  $businessInfo .= "Hours: " . getSetting('business_hours') . "\n";

  $prompt = "You are a customer support AI for " . getSetting('business_name') . ". 
Your role is to help customers with delivery services, pricing, tracking, and bookings.
Be friendly, concise, and helpful. If you cannot answer, say you'll transfer to a human agent.

{$faqContext}

{$businessInfo}

Customer: {$message}

AI:";

  $ch = curl_init('https://api.openai.com/v1/chat/completions');
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
      'Content-Type: application/json',
      'Authorization: Bearer ' . $apiKey,
    ],
    CURLOPT_POSTFIELDS => json_encode([
      'model' => getSetting('openai_model') ?: 'gpt-3.5-turbo',
      'messages' => [
        ['role' => 'system', 'content' => $prompt],
        ['role' => 'user', 'content' => $message],
      ],
      'max_tokens' => 300,
      'temperature' => 0.7,
    ]),
    CURLOPT_TIMEOUT => 15,
  ]);

  $response = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($httpCode === 200) {
    $data = json_decode($response, true);
    return $data['choices'][0]['message']['content'] ?? "Thank you for your message. A team member will get back to you shortly.";
  }

  return "Thank you for your message. A team member will get back to you shortly.";
}

jsonResponse(['error' => 'Unknown action'], 404);
