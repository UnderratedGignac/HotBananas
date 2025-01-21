<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['item_number'])) {
    $item_number = $data['item_number'];

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['item_number'] == $item_number) {
                array_splice($_SESSION['cart'], $index, 1); 
                echo json_encode(['success' => true]);
                exit;
            }
        }
    }

    echo json_encode(['success' => false, 'error' => 'Item not found']);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data']);
}
?>
