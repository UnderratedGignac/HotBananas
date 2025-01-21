<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="register.css">
  <style>
    .wrapper {
      max-height: 500px;
      overflow-y: auto;  
      padding-right: 10px; 
      overflow-x: hidden;
      margin: 0 auto; 
    }

    ::-webkit-scrollbar {
      width: 40px;  
      height: 30px;
    }

    ::-webkit-scrollbar-track {
      background: transparent;
      background-size: cover;
    }

    ::-webkit-scrollbar-thumb {
      background: transparent url('Images/bettertobecontinued-removebg-preview.png') no-repeat center center;
      background-size: cover;
      height: 20px; 
    }

    ::-webkit-scrollbar-thumb:hover {
      background: transparent url('Images/tobecontinued.png') no-repeat center center; 
      background-size: cover;
    }

    ::-webkit-scrollbar-corner {
      background: transparent;
    }

    .input-group {
      display: flex;
      justify-content: space-between;
    }

    .input-group .input-field {
      flex: 1;
      margin-right: 10px;
    }

    .input-group .input-field:last-child {
      margin-right: 0;
    }

    @media (max-width: 767px) {
      ::-webkit-scrollbar {
        width: 0px;
      }

      .wrapper {
        padding: 10px;
        max-width: 100%;
        margin: 0 15px;
      }

      .input-group {
        flex-direction: column;
      }

      .input-group .input-field {
        margin-right: 0;
        margin-bottom: 10px;
      }

      .input-group .input-field:last-child {
        margin-bottom: 0;
      }

      .input-group .input-field select,
      .input-group .input-field input {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <form action="" method="post">
      <h2>Register</h2>
      <div class="input-field">
        <input type="text" id="full-name" name="full_name" required>
        <label for="full-name">Enter your full name</label>
      </div>
      <div class="input-field">
        <input type="text" id="username" name="username" required>
        <label for="username" id="username-label">Enter your Username</label>
      </div>
      <div class="input-group">
        <div class="input-field">
          <label for="country-code"></label>
          <select id="country-code" required name="country_code">
            <option value="+961">+961 (Lebanon)</option>
            <option value="+1">+1 (USA)</option>
          </select>
        </div>
        <div class="input-field">
          <input type="text" id="phone-number" name="phone_number"pattern="\d*" maxlength="15" required style="width:100%;">
          <label for="phone-number">Enter your phone number</label>
        </div>
      </div>      
      <div class="input-field">
        <input type="text" id="address" required name="address">
        <label for="address">Enter your Address</label>
      </div>
      <div class="input-group">
        <div class="input-field">
          <input type="text" id="city" required name="city" style="width:100%;">
          <label for="city">Enter your City</label>
        </div>
        <div class="input-field">
          <input type="text" id="state" required name="state" style="width:100%;">
          <label for="state">Enter your State</label>
        </div>
      </div>
      <div class="input-group">
        <div class="input-field">
          <input type="text" id="postalcode" required name="postal_code" style="width:100%;">
          <label for="postalcode">Enter your Postal Code</label>
        </div>
        <div class="input-field">
          <input type="text" id="country" required name="country" style="width:100%;">
          <label for="country">Enter your Country</label>
        </div>
      </div>
      <div class="input-field">
        <input type="date" id="dob" name="dob" required value="2002-11-21">
        <label for="dob">Date of Birth</label>
      </div>
      <div class="input-field">
        <input type="email" id="email" name="email" required>
        <label for="email" id="emaillabel">Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" name="password" required>
        <label for="password">Enter your password</label>
      </div>
      <div class="input-field">
        <input type="password" id="confirm-password" required>
        <label for="confirm-password">Confirm your password</label>
      </div>
      <div class="forget">
        <label for="reveal-passwords">
          <input type="checkbox" id="reveal-passwords">
          <p>Reveal Password</p>
        </label>
      </div>
      <button type="submit">Register</button>
      <div class="register">
        <p>Have an account? <a href="login.php">Log In</a></p>
      </div>
    </form>
  </div>
</body>
</html>

<script>
const usernameInput = document.getElementById('username');
const usernameLabel = document.getElementById('username-label');
const form = document.querySelector('form');

usernameInput.addEventListener('input', function() {
  const usernameValue = usernameInput.value;

  if (usernameValue.length > 0) {
    // Make an AJAX request to check if the username exists
    fetch('check_username.php?username=' + encodeURIComponent(usernameValue))
      .then(response => response.json())
      .then(data => {
        if (data.exists) {
          // Change the label text and show the error icon if username exists
          usernameLabel.textContent = 'Username is already taken ✘';
          usernameLabel.style.color = 'red'; // Optional: to make the label red
          usernameInput.setCustomValidity('Username already taken');
        } else {
          // Reset label if username is available
          usernameLabel.textContent = 'Enter your Username';
          usernameLabel.style.color = ''; // Reset the label color
          usernameInput.setCustomValidity('');
        }
      })
      .catch(error => {
        console.error('Error checking username:', error);
      });
  }
});

// Prevent form submission if there is a username error
form.addEventListener('submit', function(e) {
  if (usernameInput.validity.customError) {
    e.preventDefault();
    alert('Please choose a different username.');
  }
});

const revealPasswordsCheckbox = document.getElementById('reveal-passwords');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm-password');

revealPasswordsCheckbox.addEventListener('change', function() {
  if (this.checked) {
    passwordInput.type = 'text';
    confirmPasswordInput.type = 'text';
  } else {
    passwordInput.type = 'password';
    confirmPasswordInput.type = 'password';
  }
});

// Email verification logic
const emailInput = document.getElementById('email');
const statusIcon = document.createElement('span');

statusIcon.className = 'status-icon';
emailInput.parentNode.appendChild(statusIcon);

let isEmailValid = false; // Track the email's validation status

// Email verification
emailInput.addEventListener('blur', function () {
  const email = emailInput.value;
  statusIcon.className = 'status-icon';
  statusIcon.textContent = ''; // Clear previous status

  if (email) {
    const apiKey = 'at_G8y5VdpcQc4aHU70kP1GrowjpAih3';
    const apiUrl = `https://emailverification.whoisxmlapi.com/api/v3?apiKey=${apiKey}&emailAddress=${encodeURIComponent(
      email
    )}`;

    fetch(apiUrl)
      .then((response) => response.json())
      .then((data) => {
        if (data.smtpCheck === 'true') {
          isEmailValid = true; // Valid email
          statusIcon.className = 'status-icon verified';
          statusIcon.textContent = '✔'; // Show green checkmark
        } else {
          isEmailValid = false; // Invalid email
          statusIcon.className = 'status-icon error';
          statusIcon.textContent = '✘'; // Show red cross
        }
      })
      .catch((error) => {
        console.error('Error verifying email:', error);
        isEmailValid = false; // Treat as invalid if API fails
        statusIcon.className = 'status-icon error';
        statusIcon.textContent = '!'; // Show error icon
      });
  }
});

// Prevent form submission if email is invalid
form.addEventListener('submit', function (e) {
  if (!isEmailValid) {
    e.preventDefault(); // Stop form submission
    alert('Please enter a valid email address before submitting.');
  }
});

// Password matching validation on form submission
form.addEventListener('submit', function(e) {
  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;

  // Check if the passwords match
  if (password !== confirmPassword) {
    e.preventDefault();
    alert('The passwords do not match! Please ensure both passwords are the same.');
  }
});
document.getElementById('phone-number').addEventListener('input', function(e) {
    let input = e.target.value;
    // Remove non-numeric characters
    e.target.value = input.replace(/[^0-9]/g, '');
  });
</script>


<?php
include_once 'connection.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
  // Collect data
  $username = $_POST['username'] ?? null;
  $password = $_POST['password'] ?? null;
  $email = $_POST['email'] ?? null;
  $full_name = $_POST['full_name'] ?? null;
  $phone_number = ($_POST['country_code'] ?? '') . ($_POST['phone_number'] ?? '');
  $address = $_POST['address'] ?? null;
  $city = $_POST['city'] ?? null;
  $state = $_POST['state'] ?? null;
  $postal_code = $_POST['postal_code'] ?? null;
  $country = $_POST['country'] ?? null;
  $dob = $_POST['dob'] ?? null;

  // Check if all required fields are provided
  if ($username && $password && $email) {
      // Hash the password
      $password = password_hash($password, PASSWORD_BCRYPT);

      // Prepare SQL query
      $sql = "INSERT INTO account (Username, Password, Email, FullName, PhoneNumber, Address, City, State, PostalCode, Country, DateOfBirth) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

      if ($stmt = $conn->prepare($sql)) {
          // Bind the parameters
          $stmt->bind_param("sssssssssss", $username, $password, $email, $full_name, $phone_number, $address, $city, $state, $postal_code, $country, $dob);

          // Execute the statement
          if ($stmt->execute()) {
              echo "<script>alert('Registration successful!');</script>";
          } else {
              echo "<script>alert('Error executing query: " . $stmt->error . "');</script>";
          }

          $stmt->close();
      } else {
          echo "<script>alert('Error preparing statement: " . $conn->error . "');</script>";
      }
  } else {
      echo "<script>alert('Please fill in all required fields.');</script>";
  }
}

?>
