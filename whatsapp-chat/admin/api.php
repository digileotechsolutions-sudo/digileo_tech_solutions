<?php
require_once __DIR__ . '/../db.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }

if (!isset($_SESSION['agent_id'])) jsonResponse(['error' => 'Unauthorized'], 401);

$action = $_GET['action'] ?? '';

if ($action === 'stats') {
  $total = $pdo->query("SELECT COUNT(*) FROM conversations")->fetchColumn();
  $active = $pdo->query("SELECT COUNT(*) FROM conversations WHERE status = 'active'")->fetchColumn();
  $waiting = $pdo->query("SELECT COUNT(*) FROM conversations WHERE status = 'waiting'")->fetchColumn();
  $resolved = $pdo->query("SELECT COUNT(*) FROM conversations WHERE status = 'resolved'")->fetchColumn();
  $msgsToday = $pdo->query("SELECT COUNT(*) FROM messages WHERE DATE(created_at) = CURDATE()")->fetchColumn();
  $newToday = $pdo->query("SELECT COUNT(*) FROM conversations WHERE DATE(created_at) = CURDATE()")->fetchColumn();

  $stmt = $pdo->query("SELECT DATE(created_at) as date, COUNT(*) as count FROM conversations WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) GROUP BY DATE(created_at) ORDER BY date");
  $chartData = $stmt->fetchAll();

  jsonResponse([
    'total' => (int)$total,
    'active' => (int)$active,
    'waiting' => (int)$waiting,
    'resolved' => (int)$resolved,
    'messages_today' => (int)$msgsToday,
    'new_today' => (int)$newToday,
    'chart' => $chartData,
  ]);
}

if ($action === 'conversations') {
  $status = $_GET['status'] ?? '';
  $sql = "SELECT c.*, a.name as agent_name FROM conversations c LEFT JOIN agents a ON c.agent_id = a.id";
  if ($status) $sql .= " WHERE c.status = " . $pdo->quote($status);
  $sql .= " ORDER BY c.updated_at DESC";
  $stmt = $pdo->query($sql);
  $convs = $stmt->fetchAll();
  jsonResponse(['conversations' => $convs]);
}

if ($action === 'conversation_detail') {
  $id = (int)($_GET['id'] ?? 0);
  $stmt = $pdo->prepare("SELECT c.*, a.name as agent_name FROM conversations c LEFT JOIN agents a ON c.agent_id = a.id WHERE c.id = ?");
  $stmt->execute([$id]);
  $conv = $stmt->fetch();
  if (!$conv) jsonResponse(['error' => 'Not found'], 404);

  $stmt = $pdo->prepare("SELECT * FROM messages WHERE conversation_id = ? ORDER BY created_at ASC");
  $stmt->execute([$id]);
  $conv['messages'] = $stmt->fetchAll();

  jsonResponse(['conversation' => $conv]);
}

if ($action === 'update_conversation_status') {
  $data = json_decode(file_get_contents('php://input'), true);
  $id = (int)($data['id'] ?? 0);
  $status = $data['status'] ?? '';
  if (!in_array($status, ['active', 'waiting', 'resolved', 'closed'])) jsonResponse(['error' => 'Invalid status'], 400);
  $stmt = $pdo->prepare("UPDATE conversations SET status = ? WHERE id = ?");
  $stmt->execute([$status, $id]);
  jsonResponse(['success' => true]);
}

if ($action === 'send_agent_message') {
  $data = json_decode(file_get_contents('php://input'), true);
  $convId = (int)($data['conversation_id'] ?? 0);
  $msg = trim($data['message'] ?? '');
  if (!$msg) jsonResponse(['error' => 'Message required'], 400);
  $stmt = $pdo->prepare("INSERT INTO messages (conversation_id, sender_type, sender_id, message) VALUES (?, 'agent', ?, ?)");
  $stmt->execute([$convId, $_SESSION['agent_id'], $msg]);
  jsonResponse(['success' => true]);
}

if ($action === 'agents') {
  $stmt = $pdo->query("SELECT id, name, email, role, status, created_at FROM agents ORDER BY name");
  jsonResponse(['agents' => $stmt->fetchAll()]);
}

if ($action === 'add_agent') {
  $data = json_decode(file_get_contents('php://input'), true);
  $name = trim($data['name'] ?? '');
  $email = trim($data['email'] ?? '');
  $password = $data['password'] ?? '';
  if (!$name || !$email || !$password) jsonResponse(['error' => 'All fields required'], 400);
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $pdo->prepare("INSERT INTO agents (name, email, password) VALUES (?, ?, ?)");
  $stmt->execute([$name, $email, $hash]);
  jsonResponse(['success' => true, 'id' => $pdo->lastInsertId()]);
}

if ($action === 'delete_agent') {
  $id = (int)($_GET['id'] ?? 0);
  $stmt = $pdo->prepare("DELETE FROM agents WHERE id = ? AND role != 'admin'");
  $stmt->execute([$id]);
  jsonResponse(['success' => true]);
}

if ($action === 'update_agent_status') {
  $data = json_decode(file_get_contents('php://input'), true);
  $id = (int)($data['id'] ?? $_SESSION['agent_id']);
  $status = $data['status'] ?? '';
  if (!in_array($status, ['online', 'offline', 'away'])) jsonResponse(['error' => 'Invalid status'], 400);
  $stmt = $pdo->prepare("UPDATE agents SET status = ? WHERE id = ?");
  $stmt->execute([$status, $id]);
  jsonResponse(['success' => true]);
}

if ($action === 'faqs') {
  $stmt = $pdo->query("SELECT * FROM faqs ORDER BY category, id");
  jsonResponse(['faqs' => $stmt->fetchAll()]);
}

if ($action === 'add_faq') {
  $data = json_decode(file_get_contents('php://input'), true);
  $q = trim($data['question'] ?? '');
  $a = trim($data['answer'] ?? '');
  $c = trim($data['category'] ?? 'general');
  if (!$q || !$a) jsonResponse(['error' => 'Question and answer required'], 400);
  $stmt = $pdo->prepare("INSERT INTO faqs (question, answer, category) VALUES (?, ?, ?)");
  $stmt->execute([$q, $a, $c]);
  jsonResponse(['success' => true, 'id' => $pdo->lastInsertId()]);
}

if ($action === 'update_faq') {
  $data = json_decode(file_get_contents('php://input'), true);
  $id = (int)($data['id'] ?? 0);
  $q = trim($data['question'] ?? '');
  $a = trim($data['answer'] ?? '');
  $c = trim($data['category'] ?? 'general');
  $active = isset($data['is_active']) ? ($data['is_active'] ? 1 : 0) : 1;
  if (!$id) jsonResponse(['error' => 'ID required'], 400);
  $stmt = $pdo->prepare("UPDATE faqs SET question = ?, answer = ?, category = ?, is_active = ? WHERE id = ?");
  $stmt->execute([$q, $a, $c, $active, $id]);
  jsonResponse(['success' => true]);
}

if ($action === 'delete_faq') {
  $id = (int)($_GET['id'] ?? 0);
  $stmt = $pdo->prepare("DELETE FROM faqs WHERE id = ?");
  $stmt->execute([$id]);
  jsonResponse(['success' => true]);
}

if ($action === 'settings') {
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT setting_key, setting_value FROM settings ORDER BY setting_key");
    $rows = $stmt->fetchAll();
    $settings = [];
    foreach ($rows as $r) $settings[$r['setting_key']] = $r['setting_value'];
    jsonResponse(['settings' => $settings]);
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    foreach ($data as $key => $value) {
      $stmt = $pdo->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?");
      $stmt->execute([$value, $key]);
    }
    jsonResponse(['success' => true]);
  }
}

if ($action === 'notifications') {
  $stmt = $pdo->prepare("SELECT * FROM notifications WHERE agent_id = ? OR agent_id IS NULL ORDER BY created_at DESC LIMIT 20");
  $stmt->execute([$_SESSION['agent_id']]);
  $notifs = $stmt->fetchAll();
  $unread = $pdo->prepare("SELECT COUNT(*) FROM notifications WHERE (agent_id = ? OR agent_id IS NULL) AND is_read = 0");
  $unread->execute([$_SESSION['agent_id']]);
  jsonResponse(['notifications' => $notifs, 'unread' => (int)$unread->fetchColumn()]);
}

if ($action === 'mark_read') {
  $id = (int)($_GET['id'] ?? 0);
  if ($id) {
    $stmt = $pdo->prepare("UPDATE notifications SET is_read = 1 WHERE id = ?");
    $stmt->execute([$id]);
  } else {
    $stmt = $pdo->prepare("UPDATE notifications SET is_read = 1 WHERE (agent_id = ? OR agent_id IS NULL) AND is_read = 0");
    $stmt->execute([$_SESSION['agent_id']]);
  }
  jsonResponse(['success' => true]);
}

jsonResponse(['error' => 'Unknown action'], 404);
