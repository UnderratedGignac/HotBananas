<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('You need to log in to access the cart.'); window.location.href = 'login.php';</script>";
    exit;
}

$account_id = $_SESSION['user_id'];
include 'connection.php';

$sql = "SELECT * FROM payment_methods WHERE Account_id = ? AND Payment_type = 'Credit Card'";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $account_id);
$stmt->execute();
$result = $stmt->get_result();

$hasCreditCard = $result->num_rows > 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
</head>
<body>
    <div class="scrollable-container">
        <h2>Shopping Cart</h2>
        <div class="wrapper">
            <div id="cart-items">
                <!-- Cart items will be inserted here by JavaScript -->
            </div>
            <div class="total">
                Total: $<span id="total-amount">0.00</span>
            </div>
            <?php if ($hasCreditCard): ?>
                <button class="checkout-button" onclick="window.location.href='index.php'">Proceed to Checkout</button>
            <?php else: ?>
                <button class="checkout-button" onclick="window.location.href='credit_card.php'">Proceed to Checkout</button>
            <?php endif; ?>
        </div>
    </div>

    <button class="back-button" onclick="window.location.href='index.php'">Back to Home</button>
    <script>
        function removeFromCart(itemNumber) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart = cart.filter(item => item.id !== itemNumber);
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
        }

        function changeQuantity(itemNumber, quantity) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart = cart.map(item => {
                if (item.id === itemNumber) {
                    item.quantity = parseInt(quantity);
                }
                return item;
            });
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
        }

        function updateTotal(cart) {
            let total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            document.getElementById('total-amount').textContent = total.toFixed(2);
        }

        function renderCart() {
            const cartItemsContainer = document.getElementById('cart-items');
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
                updateTotal(cart);
                return;
            }

            let cartHTML = `
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Item Number</th>
                            <th style="width: 15%;">Picture</th>
                            <th style="width: 20%;">Name</th>
                            <th style="width: 15%;">Price</th>
                            <th style="width: 10%;">Size</th>
                            <th style="width: 15%;">Quantity</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            cart.forEach(item => {
                cartHTML += `
                    <tr class="cart-item" data-item-number="${item.id}">
                        <td style="text-align: center;">${item.id}</td>
                        <td style="text-align: center;">
                            <img src="${item.image}" alt="${item.name}" class="item-image">
                        </td>
                        <td>${item.name}</td>
                        <td style="text-align: center;">$${item.price.toFixed(2)}</td>
                        <td style="text-align: center;">${item.size}</td>
                        <td style="text-align: center;">
                            <input type="number" class="quantity-input" min="1" value="${item.quantity}" onchange="changeQuantity(${item.id}, this.value)">
                        </td>
                        <td style="text-align: center;">
                            <button class="remove-button" onclick="removeFromCart(${item.id})">Remove</button>
                        </td>
                    </tr>
                `;
            });

            cartHTML += `
                    </tbody>
                </table>
            `;

            cartItemsContainer.innerHTML = cartHTML;
            updateTotal(cart);
        }

        document.addEventListener('DOMContentLoaded', renderCart);
    </script>
</body>
<link rel="stylesheet" href="carts.css">
</html>
