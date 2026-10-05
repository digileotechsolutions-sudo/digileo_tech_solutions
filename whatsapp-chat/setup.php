<?php
require_once __DIR__ . '/db.php';

// Create admin user if none exists
$stmt = $pdo->query("SELECT COUNT(*) FROM agents");
if ($stmt->fetchColumn() == 0) {
  $hash = password_hash('admin123', PASSWORD_DEFAULT);
  $stmt = $pdo->prepare("INSERT INTO agents (name, email, password, role, status) VALUES (?, ?, ?, 'admin', 'online')");
  $stmt->execute(['Admin', 'admin@digileo.com', $hash]);
  echo "Admin user created: admin@digileo.com / admin123\n";
}

echo "Database setup complete!\n";
echo "Admin login: admin@digileo.com / admin123\n";
