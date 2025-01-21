<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "<script>alert('Please enter both email and password.'); window.location.href = 'login_admin.php';</script>";
        exit;
    }

    if ($email == 'admin@gmail.com' && $password == 'eliehaddad') {
        $_SESSION['admin_loggedin'] = true; // Set admin session variable
        header('Location: admin.php');
        exit;
    } else {
        echo "<script>alert('Incorrect email or password. Please try again.'); window.location.href = 'login_admin.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Admin Login</title>
</head>
<body>
  <div class="wrapper">
    <form action="login_admin.php" method="post">
      <h2>Admin Login</h2>
      <div class="input-field">
        <input type="text" required name="email">
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" required name="password">
        <label>Enter your password</label>
      </div>
      <div class="forget">
        <label for="show-password">
          <input type="checkbox" id="show-password">
          Show Password
        </label>
      </div>
      <button type="submit">Log In</button>
    </form>
  </div>
  <script>
    const showPasswordCheckbox = document.getElementById('show-password');
    const passwordInput = document.getElementById('password');
    
    showPasswordCheckbox.addEventListener('change', function() {
      if (this.checked) {
        passwordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
      }
    });
  </script>
</body>
</html>
