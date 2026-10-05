<?php
session_start();

define('APP_NAME', 'Digileo Tech Solutions');
define('APP_ENV', getenv('APP_ENV') ?: 'production');
define('APP_DEBUG', getenv('APP_DEBUG') === 'true' ? true : false);
define('APP_URL', getenv('APP_URL') ?: 'https://digileotechsolutions.com');
define('SITE_URL', APP_URL);

date_default_timezone_set('Africa/Nairobi');

define('LOG_DIR', __DIR__ . '/../logs');
define('UPLOAD_DIR', __DIR__ . '/../uploads');
define('UPLOAD_MAX_SIZE', 10 * 1024 * 1024);
define('CACHE_DIR', __DIR__ . '/../cache');

// Performance settings
define('PERF_MINIFY_HTML', false);
define('PERF_ENABLE_CACHE', APP_ENV === 'production');
define('PERF_CACHE_TTL', 3600);

// OPcache recommended settings (place in php.ini or .user.ini)
// opcache.enable=1
// opcache.memory_consumption=256
// opcache.interned_strings_buffer=16
// opcache.max_accelerated_files=10000
// opcache.revalidate_freq=120
// opcache.fast_shutdown=1
// opcache.validate_timestamps=0

// Session optimization
ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_samesite', 'Lax');
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
  ini_set('session.cookie_secure', '1');
}
ini_set('session.gc_maxlifetime', 7200);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);

if (APP_DEBUG) {
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
} else {
  error_reporting(0);
  ini_set('display_errors', '0');
  ini_set('log_errors', '1');
  ini_set('error_log', LOG_DIR . '/error.log');
}

// PHP performance settings
if (APP_ENV === 'production') {
  ini_set('zlib.output_compression', 'On');
  ini_set('zlib.output_compression_level', '6');
  ini_set('output_handler', '');
}

if (!is_dir(LOG_DIR)) {
  @mkdir(LOG_DIR, 0755, true);
}
if (!is_dir(UPLOAD_DIR)) {
  @mkdir(UPLOAD_DIR, 0755, true);
}
if (!is_dir(CACHE_DIR)) {
  @mkdir(CACHE_DIR, 0755, true);
}

// CSRF Protection
if (!isset($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function csrfToken() {
  return $_SESSION['csrf_token'];
}

function csrfField() {
  return '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">';
}

function verifyCsrf($token = null) {
  $token = $token ?? ($_POST['csrf_token'] ?? '');
  if (!hash_equals($_SESSION['csrf_token'], $token)) {
    logError('CSRF token mismatch');
    return false;
  }
  return true;
}

// Logging
function logError($message, $context = []) {
  $logFile = LOG_DIR . '/app.log';
  $timestamp = date('Y-m-d H:i:s');
  $line = "[{$timestamp}] ERROR: {$message}";
  if (!empty($context)) {
    $line .= ' | Context: ' . json_encode($context);
  }
  $line .= PHP_EOL;
  @file_put_contents($logFile, $line, FILE_APPEND | LOCK_EX);
}

function logAccess($message = '') {
  $logFile = LOG_DIR . '/access.log';
  $timestamp = date('Y-m-d H:i:s');
  $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
  $uri = $_SERVER['REQUEST_URI'] ?? 'unknown';
  $method = $_SERVER['REQUEST_METHOD'] ?? 'unknown';
  $line = "[{$timestamp}] {$method} {$uri} - {$ip}" . ($message ? " - {$message}" : '') . PHP_EOL;
  @file_put_contents($logFile, $line, FILE_APPEND | LOCK_EX);
}

// Input sanitization
function sanitizeInput($data) {
  if (is_array($data)) {
    return array_map('sanitizeInput', $data);
  }
  return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function sanitizeOutput($data) {
  if (is_array($data)) {
    return array_map('sanitizeOutput', $data);
  }
  return htmlspecialchars((string)$data, ENT_QUOTES, 'UTF-8');
}

function validateEmail($email) {
  return filter_var(trim($email), FILTER_VALIDATE_EMAIL) !== false;
}

function validatePhone($phone) {
  return preg_match('/^\+?[\d\s\-\(\)]{7,20}$/', trim($phone));
}

function redirect($url) {
  header('Location: ' . $url);
  exit;
}

function jsonResponse($data, $code = 200) {
  http_response_code($code);
  header('Content-Type: application/json');
  echo json_encode($data);
  exit;
}
