<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('You need to log in to proceed to checkout.'); window.location.href = 'login.php';</script>";
    exit;
}
$account_id = $_SESSION['account_id'];  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Credit Card Payment</title>
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      min-height: 100vh;
      width: 100%;
      padding: 20px;
      background: url('Images/1849677cea5163372b1f4578944d76db.jpg') center/cover no-repeat fixed;
      overflow: hidden; }

    h2 {
      font-size: 2.5rem;
      color: #F7E7CE;
      text-align: center;
      margin-bottom: 20px;
    }

    .wrapper {
      max-width: 900px; 
      width: 100%;
      margin: 0 auto;
      padding: 20px;
      background: rgba(255, 255, 255, 0.1); 
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
      max-height: 60vh; 
      overflow-y: auto; 
      overflow-x: hidden; 
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-size: 1rem;
      color: #F7E7CE;
      margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ddd;
      border-radius: 5px;
      background: transparent;
      color: #F7E7CE;
    }

    .total {
      font-size: 1.8rem;
      font-weight: bold;
      color: #F7E7CE;
      margin-top: 20px;
      text-align: center;
    }

    button {
      background: #F7E7CE;
      color: #001f3f;
      border: none;
      padding: 12px 20px;
      cursor: pointer;
      border-radius: 5px;
      font-size: 1rem;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background: #ffd700;
    }

    .back-button {
      position: fixed;
      top: 20px;
      right: 20px;
      background-color: #FFD700;
      color: #001f3f;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.3s ease;
    }

    .back-button:hover {
      background-color: #FFC300;
      transform: scale(1.05);
    }

    @media (max-width: 768px) {
      h2 {
        font-size: 2rem;
      }

      .wrapper {
        padding: 10px;
        max-height: none; 
      }

      .form-group input,
      .form-group textarea {
        padding: 8px;
        font-size: 0.9rem;
      }

      button {
        padding: 10px 15px;
        font-size: 0.9rem;
      }

      .total {
        font-size: 1.5rem;
      }
    }

    ::-webkit-scrollbar {
      width: 60px;
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background: transparent url('Images/bettertobecontinued-removebg-preview.png') no-repeat center center;
      background-size: cover;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: transparent url('Images/tobecontinued.png') no-repeat center center;
      background-size: cover;
    }

    ::-webkit-scrollbar-corner {
      background: transparent;
    }
  </style>
</head>
<body>
    <div class="scrollable-container">
        <h2>Credit Card Payment</h2>
        <div class="wrapper">
            <form id="payment-form" method="post" action="process_payment.php">
                <div class="form-group">
                    <label for="cardholder-name">Cardholder Name</label>
                    <input type="text" id="cardholder-name" name="cardholder_name" required>
                </div>
                <div class="form-group">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card_number" required>
                </div>
                <div class="form-group">
                    <label for="expiry-date">Expiry Date</label>
                    <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" required>
                </div>
                <div class="form-group">
                    <label for="billing-address">Billing Address</label>
                    <textarea id="billing-address" name="billing_address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="zip-code">Zip Code</label>
                    <input type="text" id="zip-code" name="zip_code" required>
                </div>
                <div class="total">
                    Total: $
                    <?php
                    $total = 100.00; 
                    echo number_format($total, 2);
                    ?>
                </div>
                <button class="checkout-button" type="submit">Submit Payment</button>
            </form>
        </div>
    </div>

    <button class="back-button" onclick="window.location.href='cart.php'">Back to Cart</button>
    <script>
        document.getElementById('payment-form').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('payment-form').submit(); 
        });
    </script>
    <?php

if (session_status() == PHP_SESSION_NONE) { session_start(); }
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_id = $_SESSION['account_id'];
    $cardholder_name = $_POST['cardholder_name'];
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    $payment_type = "Credit Card";  

    $stmt = $conn->prepare("INSERT INTO payment_methods (Account_id, Payment_type, Card_number, Expiry_date, Cvv) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $account_id, $payment_type, $card_number, $expiry_date, $cvv);

    if ($stmt->execute()) {
        echo "Payment method added successfully.";
        
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

</body>
</html>
