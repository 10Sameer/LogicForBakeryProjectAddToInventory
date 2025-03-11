<?php
session_start();

// Hardcoded login credentials (replace with database validation in a real application)
$valid_userid = '2';
$valid_password = '1';

if (isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    // Validate credentials
    if ($userid === $valid_userid && $password === $valid_password) {
        $_SESSION['userid'] = $userid; // Store user ID in session
        header('Location: dashboard.php'); // Redirect to dashboard
        exit();
    } else {
        $error = "Invalid User ID or Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <div class="login-container">
    <div class="glass-form">
      <h2>Admin Login</h2>
      <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
      <?php endif; ?>
      <form action="index.php" method="POST">
        <div class="input-group">
          <label for="userid">User ID</label>
          <input type="text" id="userid" name="userid" required>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" name="login">Login</button>
      </form>
    </div>
  </div>
</body>
</html>