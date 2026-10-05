<?php
require_once __DIR__ . '/db.php';

// Handle WhatsApp Cloud API webhook verification and incoming messages

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Webhook verification
  $verifyToken = getSetting('whatsapp_verify_token') ?: 'digileo_chat_verify_2024';
  $mode = $_GET['hub_mode'] ?? '';
  $token = $_GET['hub_verify_token'] ?? '';
  $challenge = $_GET['hub_challenge'] ?? '';

  if ($mode === 'subscribe' && $token === $verifyToken) {
    echo $challenge;
    exit;
  }
  http_response_code(403);
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = json_decode(file_get_contents('php://input'), true);

  // Process incoming WhatsApp message
  if (isset($input['entry'])) {
    foreach ($input['entry'] as $entry) {
      foreach ($entry['changes'] ?? [] as $change) {
        if (($change['field'] ?? '') === 'messages') {
          $msg = $change['value']['messages'][0] ?? null;
          $contact = $change['value']['contacts'][0] ?? null;

          if ($msg && $contact) {
            $from = $contact['wa_id'] ?? '';
            $text = $msg['text']['body'] ?? '';
            $type = $msg['type'] ?? 'text';

            if ($text) {
              // Find or create conversation
              $stmt = $pdo->prepare("SELECT id FROM conversations WHERE contact_phone = ? AND status IN ('active','waiting') ORDER BY created_at DESC LIMIT 1");
              $stmt->execute([$from]);
              $conv = $stmt->fetch();

              if (!$conv) {
                $stmt = $pdo->prepare("INSERT INTO conversations (contact_phone, contact_name, source, status) VALUES (?, ?, 'whatsapp', 'active')");
                $stmt->execute([$from, $contact['profile']['name'] ?? '']);
                $convId = $pdo->lastInsertId();

                // Send welcome message via WhatsApp API
                $welcome = getSetting('welcome_message') ?: 'Hello 👋 Welcome!';
                sendWhatsAppMessage($from, $welcome);
              } else {
                $convId = $conv['id'];
              }

              // Store incoming message
              $stmt = $pdo->prepare("INSERT INTO messages (conversation_id, sender_type, message, message_type) VALUES (?, 'visitor', ?, ?)");
              $stmt->execute([$convId, $text, $type]);

              // AI response
              $aiEnabled = getSetting('ai_enabled') === 'true';
              if ($aiEnabled) {
                require_once __DIR__ . '/api/chat.php';
                $faqMatch = matchFAQ($pdo, $text);
                if ($faqMatch) {
                  $reply = $faqMatch;
                } else {
                  $reply = getAIResponse($pdo, $text);
                }

                $stmt = $pdo->prepare("INSERT INTO messages (conversation_id, sender_type, message) VALUES (?, 'ai', ?)");
                $stmt->execute([$convId, $reply]);

                // Send reply via WhatsApp API
                sendWhatsAppMessage($from, $reply);
              }

              // Notify agents
              $stmt = $pdo->prepare("INSERT INTO notifications (title, message, type) VALUES (?, ?, 'new_message')");
              $stmt->execute(['New WhatsApp message', "From: {$from}"]);
            }
          }
        }
      }
    }
  }

  http_response_code(200);
  echo json_encode(['status' => 'ok']);
}

function sendWhatsAppMessage($to, $message) {
  $token = getSetting('whatsapp_business_api_token');
  $phoneId = getSetting('whatsapp_phone_number_id');

  if (!$token || !$phoneId) return;

  $url = "https://graph.facebook.com/v18.0/{$phoneId}/messages";

  $data = [
    'messaging_product' => 'whatsapp',
    'to' => $to,
    'type' => 'text',
    'text' => ['body' => $message],
  ];

  $ch = curl_init($url);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
      'Content-Type: application/json',
      'Authorization: Bearer ' . $token,
    ],
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_TIMEOUT => 10,
  ]);
  curl_exec($ch);
  curl_close($ch);
}
