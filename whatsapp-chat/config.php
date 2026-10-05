<?php
session_start();

define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_NAME', getenv('DB_NAME') ?: 'digileo_chat');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');

define('BASE_PATH', '/whatsapp-chat/');
define('SITE_URL', getenv('APP_URL') ?: 'http://localhost/digileo_tech_solutions');
define('API_URL', SITE_URL . '/whatsapp-chat/api');

function isAuthenticated() {
  return isset($_SESSION['agent_id']);
}

function requireAuth() {
  if (!isAuthenticated()) {
    header('Location: login.php');
    exit;
  }
}
