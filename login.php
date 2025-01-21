<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "<script>alert('Please enter both email and password.'); window.location.href = 'login.php';</script>";
        exit;
    }

    $sql = "SELECT * FROM account WHERE Email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_row()) {
            $user_id = $row[0];
            $username = $row[1];
            $stored_password = $row[2];

            if (password_verify($password, $stored_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;

                $_SESSION['cart'] = [];
                echo "<script>localStorage.removeItem('cart');</script>";
                header('Location: index.php');
                exit;
            } else {
                echo "<script>alert('Incorrect password. Please try again.'); window.location.href = 'login.php';</script>";
            }
        }
    } else {
        echo "<script>alert('No user found with this email.'); window.location.href = 'login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Login Form</title>
</head>
<body>
  <div class="wrapper">
    <form action="login.php" method="post">
      <h2>Login</h2>
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
      <div class="register">
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </div>
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
