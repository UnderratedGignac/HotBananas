<?php
session_start();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

function is_valid_integer($value) {
    return filter_var($value, FILTER_VALIDATE_INT) !== false;
}

function log_error($message) {
    error_log($message);
    echo json_encode(['success' => false, 'error' => $message]);
    exit;
}

if (!isset($data['item_number']) || !is_valid_integer($data['item_number'])) {
    log_error('Invalid or missing item_number');
}

if (!isset($data['quantity']) || !is_valid_integer($data['quantity'])) {
    log_error('Invalid or missing quantity');
}

$itemNumber = (int)$data['item_number'];
$quantity = (int)$data['quantity'];

// Debugging output
error_log("Received item_number: $itemNumber");
error_log("Received quantity: $quantity");
error_log("Cart content: " . print_r($_SESSION['cart'], true));

if ($quantity <= 0) {
    log_error('Invalid quantity');
}

if (!isset($_SESSION['cart'][$itemNumber])) {
    log_error('Item not found in cart');
}

$_SESSION['cart'][$itemNumber]['quantity'] = $quantity;
echo json_encode(['success' => true]);
exit;
?>
