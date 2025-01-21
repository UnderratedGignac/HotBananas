<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['user_id'])) { 
        $account_id = $_SESSION['user_id'];
    } else {
        die('Account ID is not set in the session.');
    }

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
