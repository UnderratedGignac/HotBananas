<?php
session_start();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

function is_valid_integer($value) {
    return filter_var($value, FILTER_VALIDATE_INT) !== false;
}

function log_error($message) {
    error_log($message);
    echo json_encode(['success' => false, 'message' => $message]);
    exit;
}

if (isset($data['id'], $data['name'], $data['price'], $data['quantity'], $data['image']) && is_valid_integer($data['quantity'])) {
    if (!isset($_SESSION['item_count'])) {
        $_SESSION['item_count'] = 0;
    }

    $cartItem = [
        'item_number' => $_SESSION['item_count']++,
        'name' => $data['name'],
        'price' => $data['price'],
        'quantity' => (int)$data['quantity'], // Ensure quantity is an integer
        'size' => $data['size'] ?? null,
        'image' => $data['image']
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Debugging output
    error_log("Adding item to cart: " . print_r($cartItem, true));

    $_SESSION['cart'][] = $cartItem;

    echo json_encode(['success' => true]);
} else {
    log_error('Invalid cart item data');
}
?>
