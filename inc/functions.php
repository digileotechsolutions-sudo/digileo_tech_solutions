<?php
require_once __DIR__ . '/../config/config.php';

function e($value) {
  return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function getBasePath() {
  return (strpos($_SERVER['SCRIPT_NAME'], '/pages/') !== false) ? '../' : '';
}

function getServicePrefix() {
  return getBasePath() === '../' ? '' : 'pages/';
}

function getCurrentUrl() {
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
  $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
  $uri = $_SERVER['REQUEST_URI'] ?? '/';
  $host = filter_var($host, FILTER_SANITIZE_URL);
  $uri = filter_var($uri, FILTER_SANITIZE_URL);
  return $protocol . '://' . $host . $uri;
}

function isServicePage($page) {
  $servicePages = ['graphic-design', 'web-design', 'web-development', 'software-hardware', 'printing', 'consultancy', 'portfolio'];
  return in_array($page, $servicePages);
}
