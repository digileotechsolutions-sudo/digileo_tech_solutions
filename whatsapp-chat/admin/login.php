<?php
require_once __DIR__ . '/../db.php';
if (isAuthenticated()) { header('Location: index.php'); exit; }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  if ($email && $password) {
    $stmt = $pdo->prepare("SELECT * FROM agents WHERE email = ?");
    $stmt->execute([$email]);
    $agent = $stmt->fetch();
    if ($agent && password_verify($password, $agent['password'])) {
      $_SESSION['agent_id'] = $agent['id'];
      $_SESSION['agent_name'] = $agent['name'];
      $_SESSION['agent_role'] = $agent['role'];
      $stmt = $pdo->prepare("UPDATE agents SET status = 'online' WHERE id = ?");
      $stmt->execute([$agent['id']]);
      header('Location: index.php');
      exit;
    }
    $error = 'Invalid email or password';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Admin - Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', system-ui, sans-serif; background: #f0f2f5; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
    .login-card { background: #fff; padding: 40px; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); width: 400px; max-width: 90vw; }
    .login-card h1 { font-size: 24px; color: #075E54; margin-bottom: 4px; }
    .login-card p { color: #666; margin-bottom: 24px; font-size: 14px; }
    .login-card label { font-size: 13px; font-weight: 600; color: #333; display: block; margin-bottom: 6px; }
    .login-card input { width: 100%; padding: 12px 16px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; margin-bottom: 16px; outline: none; transition: border-color 0.3s; }
    .login-card input:focus { border-color: #25D366; box-shadow: 0 0 0 3px rgba(37,211,102,0.1); }
    .login-card button { width: 100%; padding: 12px; background: #075E54; color: #fff; border: none; border-radius: 8px; font-size: 15px; font-weight: 600; cursor: pointer; transition: background 0.3s; }
    .login-card button:hover { background: #128C7E; }
    .login-card .error { background: #fef2f2; color: #dc2626; padding: 10px 14px; border-radius: 8px; font-size: 13px; margin-bottom: 16px; }
    .login-card .logo { text-align: center; margin-bottom: 24px; }
    .login-card .logo i { font-size: 40px; color: #25D366; }
    .login-card .logo h2 { font-size: 18px; color: #075E54; margin-top: 8px; }
  </style>
</head>
<body>
  <div class="login-card">
    <div class="logo">
      <i class="fab fa-whatsapp"></i>
      <h2>Chat Admin Panel</h2>
    </div>
    <h1>Welcome Back</h1>
    <p>Sign in to manage conversations</p>
    <?php if ($error): ?><div class="error"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="POST">
      <label>Email</label>
      <input type="email" name="email" required autocomplete="email" placeholder="admin@example.com">
      <label>Password</label>
      <input type="password" name="password" required autocomplete="current-password" placeholder="Enter password">
      <button type="submit"><i class="fas fa-sign-in-alt"></i> Sign In</button>
    </form>
  </div>
</body>
</html>
