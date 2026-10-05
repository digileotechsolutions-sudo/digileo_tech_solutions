<?php
require_once __DIR__ . '/config.php';

try {
  $pdo = new PDO(
    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
    DB_USER,
    DB_PASS,
    [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
    ]
  );
} catch (PDOException $e) {
  $error_msg = 'Database connection failed. Please try again later.';
  if (defined('APP_DEBUG') && APP_DEBUG) {
    $error_msg .= ' Error: ' . $e->getMessage();
  }
  die(json_encode(['error' => $error_msg]));
}

function getSetting($key) {
  global $pdo;
  static $cache = [];
  if (isset($cache[$key])) {
    return $cache[$key];
  }
  try {
    $stmt = $pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = ?");
    $stmt->execute([$key]);
    $row = $stmt->fetch();
    $value = $row ? $row['setting_value'] : null;
    $cache[$key] = $value;
    return $value;
  } catch (PDOException $e) {
    return null;
  }
}

function jsonResponse($data, $code = 200) {
  http_response_code($code);
  header('Content-Type: application/json');
  echo json_encode($data);
  exit;
}
