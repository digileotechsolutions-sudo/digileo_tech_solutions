<?php
require_once __DIR__ . '/config.php';

$db_host = getenv('DB_HOST') ?: 'localhost';
$db_name = getenv('DB_NAME') ?: 'bosrenad_digileo';
$db_user = getenv('DB_USER') ?: 'bosrenad_digileo';
$db_pass = getenv('DB_PASS') ?: 'Bitdownload.ir962';

// Use persistent connections in production for better performance
$pdoOptions = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
  PDO::ATTR_STRINGIFY_FETCHES  => false,
];

if (APP_ENV === 'production') {
  $pdoOptions[PDO::ATTR_PERSISTENT] = true;
}

try {
  $pdo = new PDO(
    "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4",
    $db_user,
    $db_pass,
    $pdoOptions
  );

  // Set session-level optimizations
  $pdo->exec("SET SESSION sql_mode = 'STRICT_ALL_TABLES'");
  $pdo->exec("SET SESSION innodb_lock_wait_timeout = 50");

} catch (PDOException $e) {
  logError('Database connection failed: ' . $e->getMessage());
  if (APP_DEBUG) {
    die('Database connection failed: ' . $e->getMessage());
  }
  die('A database error occurred. Please try again later.');
}

// Cached query wrapper for read-heavy operations
function dbQuery($sql, $params = [], $ttl = 0)
{
  global $pdo;

  if ($ttl > 0) {
    $cacheKey = 'dbq_' . md5($sql . serialize($params));
    $cached = cacheGet($cacheKey, $ttl);
    if ($cached !== null) {
      return $cached;
    }
  }

  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $isSelect = stripos(trim($sql), 'SELECT') === 0;
    $result = $isSelect ? $stmt->fetchAll() : $stmt->rowCount();

    if ($ttl > 0 && $isSelect) {
      cacheSet($cacheKey, $result);
    }

    return $result;
  } catch (PDOException $e) {
    logError("dbQuery failed: {$sql}", ['params' => $params, 'error' => $e->getMessage()]);
    return false;
  }
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
    logError("getSetting failed for key: {$key}", ['error' => $e->getMessage()]);
    return null;
  }
}
