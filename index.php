<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
                            .custom-button {
                                background-color: transparent;
                                padding: 20px;
                                border: 0px;
                                color: #F7E7CE;
                                margin-top: 20px;
                                font-size: 25px;
                                cursor: pointer;
                            }
                            .siuu{
                                background:url('Images/1849677cea5163372b1f4578944d76db.jpg') no-repeat center center;
                                background-size:cover;
                            }

                            .custom-button:hover {
                                color:#FFD700;
                            }

                            .custom-button:hover::after {
                                width: 100%;
                                background-color: #001f3f;
                            }   

                            .custom-button::after {
                                content: '';
                                display: block;
                                margin: auto;
                                height: 2px;
                                width: 0px;
                                background: transparent;
                                transition: width 0.25s ease-out, background-color 0.25s ease-out;
                            }
.quantity-container {
    margin-bottom: 20px;
    text-align: center;
}

.quantity-label {
    font-size: 20px; 
    color: #F7E7CE;
    margin-bottom: 10px;
    display: block;
}

.quantity-input {
    width: 80%;
    font-size: 20px;
    border: 2px solid #ccc;
    border-radius: 5px;
    background-color: transparent;
    color: #F7E7CE;
    text-align: center;

}

.custom-button {
    background-color: #FFD700;
    color: #fff;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    font-size: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.custom-button:hover {
    color:#FFD700;
}
option {
    color:#001f3f;
    background-color:#F7E7CE;
    text-align :center;
}
@media (max-width: 767px) {
    .product-card {
        width: 100%;
    }

    .imgBox {
        height: 150px; 
    }

    .product-title {
        font-size: 18px;
    }

    .price {
        font-size: 16px;
    }

    .quantity-input {
        font-size: 18px;  
        padding: 12px; 
    }

    .quantity-label {
        font-size: 18px; 
    }

    .custom-button {
        font-size: 14px;
        padding: 10px 20px;
    }
}

@media (min-width: 768px) and (max-width: 1024px) {
    .product-card {
        width: 100%;
    }

    .product-title {
        font-size: 18px;
    }

    .price {
        font-size: 17px;
    }
}

::-webkit-scrollbar {
    width: 20px; 
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

section {
    overflow-y: auto;
}
@media (max-width: 768px) {
             ::-webkit-scrollbar { width:0; } }

</style><?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
                            .custom-button {
                                background-color: transparent;
                                padding: 20px;
                                border: 0px;
                                color: #F7E7CE;
                                margin-top: 20px;
                                font-size: 25px;
                                cursor: pointer;
                            }
                            .siuu{
                                background:url('Images/1849677cea5163372b1f4578944d76db.jpg') no-repeat center center;
                                background-size:cover;
                            }

                            .custom-button:hover {
                                color:#FFD700;
                            }

                            .custom-button:hover::after {
                                width: 100%;
                                background-color: #001f3f;
                            }   

                            .custom-button::after {
                                content: '';
                                display: block;
                                margin: auto;
                                height: 2px;
                                width: 0px;
                                background: transparent;
                                transition: width 0.25s ease-out, background-color 0.25s ease-out;
                            }
                            /* Styling for quantity section */
.quantity-container {
    margin-bottom: 20px;
    text-align: center;
}

.quantity-label {
    font-size: 20px; /* Increased font size */
    color: #F7E7CE;
    margin-bottom: 10px;
    display: block;
}

.quantity-input {
    width: 80%;
    font-size: 20px; /* Increased font size */
    border: 2px solid #ccc;
    border-radius: 5px;
    background-color: transparent;
    color: #F7E7CE;
    text-align: center;

}

.custom-button {
    background-color: #FFD700;
    color: #fff;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    font-size: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.custom-button:hover {
    color:#FFD700;
}
option {
    color:#001f3f;
    background-color:#F7E7CE;
    text-align :center;
}
/* Media query for small screens */
@media (max-width: 767px) {
    .product-card {
        width: 100%;
    }

    .imgBox {
        height: 150px; /* Adjust image size for small screens */
    }

    .product-title {
        font-size: 18px;
    }

    .price {
        font-size: 16px;
    }

    .quantity-input {
        font-size: 18px; /* Adjust font size of input for small screens */
        padding: 12px; /* Adjust padding for smaller devices */
    }

    .quantity-label {
        font-size: 18px; /* Adjust font size of label for small screens */
    }

    .custom-button {
        font-size: 14px;
        padding: 10px 20px;
    }
}

/* Media query for medium screens */
@media (min-width: 768px) and (max-width: 1024px) {
    .product-card {
        width: 100%;
    }

    .product-title {
        font-size: 18px;
    }

    .price {
        font-size: 17px;
    }
}

::-webkit-scrollbar {
    width: 20px; 
}

::-webkit-scrollbar-track {
    background: transparent; /* Make the track transparent */
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

section {
    overflow-y: auto;
}
@media (max-width: 768px) {
             ::-webkit-scrollbar { width:0; } }

</style><!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<section class="siuu" style="width:100%;height:100%;">
<?php include 'navbar.php' ?>
<body>
    <div class="content">
        <h1 class="smash">“Quality is not an act, it is a habit. Dress well, live well”</h1>  
        <div class="container mt-5">
            <?php
            include_once 'connection.php';

            // Query categories and their products
            $sql = "SELECT c.Category_id, c.Category_name, p.Product_id, p.Product_name, p.Description, p.Price, p.Image_url 
                    FROM categories c
                    INNER JOIN products p ON c.Category_id = p.Category_id
                    ORDER BY c.Category_id, p.Product_name";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            $currentCategory = null;

            while ($product = $result->fetch_assoc()) {
                if ($currentCategory !== $product['Category_name']) {
                    if ($currentCategory !== null) {
                        echo '</div></div>'; // Close the previous category's section
                    }
                    $currentCategory = $product['Category_name'];
                    echo '<div class="container mt-5">';
                    echo '<h2 class="text-center mb-4" style="color:#FFD700; font-size:30px;">' . htmlspecialchars($currentCategory) . '</h2>';
                    echo '<div class="row border p-4"> ';
                }

                echo '<div class="col-md-4 mb-4 product-card-wrapper">';
                if ($product['Category_name'] != "Accessories")
                    echo '<div class="product-card border rounded shadow-sm" style="width: 500px; height:530px;"> ';
                else
                    echo '<div class="product-card border rounded shadow-sm" style="width: 500px; height:430px;"> ';
                echo '<div class="imgBox">';
                echo '<img src="' . $product['Image_url'] . '" class="img-fluid" style="margin: top 10px;" alt="Product Image">';
                echo '</div>';
                echo '<div class="contentBox p-3">';
                echo '<h3 class="product-title">' . htmlspecialchars($product['Product_name']) . '</h3>';
                echo '<p class="price">$' . htmlspecialchars($product['Price']) . '</p>';
                if ($product['Category_name'] != "Accessories") {
                    echo '<div class="quantity-container">';
                    echo '<label for="size_' . $product['Product_id'] . '" class="quantity-label">Size</label>';
                    if ($product['Category_name'] == "Hoodie" || $product['Category_name'] == "T-Shirts") {
                        echo '<select id="size_' . $product['Product_id'] . '" class="quantity-input">';
                        echo '<option value="S">S</option><option value="M">M</option><option value="L">L</option>';
                        echo '</select>';
                    }
                    if ($product['Category_name'] == "Shoes") {
                        echo '<select id="size_' . $product['Product_id'] . '" class="quantity-input">';
                        echo '<option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option>';
                        echo '</select>';
                    }
                    echo '</div>';
                }
                echo '<button class="custom-button" style="background:transparent;font-size:25px;" onclick="addToCart(' . $product['Product_id'] . ', \'' . htmlspecialchars(addslashes($product['Product_name'])) . '\', ' . $product['Price'] . ', \'' . htmlspecialchars($product['Image_url']) . '\')">Add to Cart</button>';
                echo '</div></div></div>';
            }

            if ($currentCategory !== null) {
                echo '</div></div>'; // Close the last category's section
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
function addToCart(productId, productName, productPrice, productImage) {
    const sizeSelect = document.querySelector(`#size_${productId}`);
    const size = sizeSelect ? sizeSelect.value : null;

    const quantity = 1; // Default to 1 for now (modify as needed)

    // Create a cart item object
    const cartItem = {
        id: productId,
        name: productName,
        price: productPrice,
        quantity: quantity,
        size: size,
        image: productImage
    };

    // Retrieve the current cart from local storage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Add the new item to the cart
    cart.push(cartItem);

    // Save the updated cart back to local storage
    localStorage.setItem('cart', JSON.stringify(cart));

    alert('Product added to cart!');
}

// Example function to display cart items (for debugging purposes)
function displayCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    console.log(cart);
}

document.addEventListener('DOMContentLoaded', displayCart);
    </script>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</section>
</html>
