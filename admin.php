<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    echo "<script>alert('You need to log in as admin to access this page.'); window.location.href = 'login_admin.php';</script>";
    exit;
}

include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'update') {
        $product_id = $_POST['product_id'];
        $category_id = $_POST['category_id'];
        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image'];
            $imagePath = 'Images/' . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $imagePath);
        } else {
            $imagePath = $_POST['existing_image_url'];
        }

        $sql = "UPDATE products SET Category_id='$category_id', Product_name='$product_name', Description='$description', Price='$price', Image_url='$imagePath' WHERE Product_id='$product_id'";
        $conn->query($sql);
    } elseif ($action === 'delete') {
        $product_id = $_POST['product_id'];

        $sql = "DELETE FROM products WHERE Product_id='$product_id'";
        $conn->query($sql);
    } elseif ($action === 'add') {
        $category_id = $_POST['category_id'];
        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $image = $_FILES['image'];
        $imagePath = 'Images/' . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $imagePath);

        $sql = "INSERT INTO products (Category_id, Product_name, Description, Price, Image_url) VALUES ('$category_id', '$product_name', '$description', '$price', '$imagePath')";
        $conn->query($sql);
    }
}

$sql = "SELECT c.Category_id, c.Category_name, p.Product_id, p.Product_name, p.Description, p.Price, p.Image_url 
        FROM categories c
        INNER JOIN products p ON c.Category_id = p.Category_id
        ORDER BY c.Category_id, p.Product_name";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$categories = [];
$sql_categories = "SELECT Category_id, Category_name FROM categories";
$result_categories = $conn->query($sql_categories);
while ($row = $result_categories->fetch_assoc()) {
    $categories[$row['Category_id']] = $row['Category_name'];
}

$currentCategory = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<section class="siuu" style="width:100%;height:100%;">
<body>
    <div class="content">
        <h1 class="smash">Admin Panel</h1>  
        <div class="container mt-5">
            <div>
                <button class="hi" onclick="showAddForm()">Add New Product</button>
            </div>

            <?php while ($product = $result->fetch_assoc()) : ?>
                <?php if ($currentCategory !== $product['Category_name']) : ?>
                    <?php if ($currentCategory !== null) : ?>
                        </div></div>
                    <?php endif; ?>
                    <?php $currentCategory = $product['Category_name']; ?>
                    <div class="container mt-5">
                    <h2 class="text-center mb-4" style="color:#FFD700; font-size:30px;"><?= htmlspecialchars($currentCategory) ?></h2>
                    <div class="row border p-4">
                <?php endif; ?>

                <div class="col-md-4 mb-4 product-card-wrapper">
                    <div class="product-card border rounded shadow-sm" style="width: 500px; height:430px;">
                        <div class="imgBox">
                            <img src="<?= $product['Image_url'] ?>" class="img-fluid" alt="Product Image">
                        </div>
                        <div class="contentBox p-3">
                            <h3 class="product-title"><?= htmlspecialchars($product['Product_name']) ?></h3>
                            <p class="price">$<?= htmlspecialchars($product['Price']) ?></p>
                            <div class="text-right">
                                <button class="edit-button" onclick="showUpdateForm(<?= $product['Product_id'] ?>, '<?= htmlspecialchars($product['Category_id']) ?>', '<?= htmlspecialchars($categories[$product['Category_id']]) ?>', '<?= htmlspecialchars($product['Product_name']) ?>', '<?= htmlspecialchars($product['Description']) ?>', '<?= htmlspecialchars($product['Price']) ?>', '<?= htmlspecialchars($product['Image_url']) ?>')">Edit</button>
                                <form action="admin.php" method="post" style="display:inline-block;">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="product_id" value="<?= $product['Product_id'] ?>">
                                    <button type="submit" class="delete-button">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            <?php if ($currentCategory !== null) : ?>
                </div></div>
            <?php endif; ?>
        </div>
    </div>

    <div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeUpdateForm()">&times;</span>
        <h3>Update Product</h3>
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="update">
            <input type="hidden" id="update_product_id" name="product_id">
            <input type="hidden" id="existing_image_url" name="existing_image_url">
            <div class="form-group">
                <label for="update_category_name">Category:</label>
                <select class="form-control" id="update_category_name" name="category_id" required>
                    <?php foreach ($categories as $id => $name) : ?>
                        <option value="<?= $id ?>"><?= htmlspecialchars($name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="update_product_name">Product Name:</label>
                <input type="text" class="form-control" id="update_product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="update_description">Description:</label>
                <input type="text" class="form-control" id="update_description" name="description" required>
            </div>
            <div class="form-group">
                <label for="update_price">Price:</label>
                <input type="number" class="form-control" id="update_price" name="price" required>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" id="update_image" name="image" style="display:none;">
            </div>
            <button type="submit" class="custom-button">Update Product</button>
        </form>
    </div>
</div>

    <div id="addModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeAddForm()">&times;</span>
        <h3>Add New Product</h3>
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for="add_category_name">Category:</label>
                <select class="form-control" id="add_category_name" name="category_id" required>
                    <?php foreach ($categories as $id => $name) : ?>
                        <option value="<?= $id ?>"><?= htmlspecialchars($name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="add_product_name">Product Name:</label>
                <input type="text" class="form-control" id="add_product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="add_description">Description:</label>
                <input type="text" class="form-control" id="add_description" name="description" required>
            </div>
            <div class="form-group">
                <label for="add_price">Price:</label>
                <input type="number" class="form-control" id="add_price" name="price" required>
            </div>
            <div class="form-group">
                <label for="add_image">Image:</label>
                <input type="file" class="form-control" id="add_image" name="image" required>
            </div>
            <button type="submit" class="custom-button">Add Product</button>
        </form>
    </div>
</div>

    <style>
.hi {
        background-color: #FFD700;
        color: #fff;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        font-size: 20px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        margin-top: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    }
    
    .custom-button, .edit-button, .delete-button {
        background-color: #FFD700;
        color: #fff;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        margin-top: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .custom-button:hover, .edit-button:hover, .delete-button:hover {
        background-color: #ffc107;
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
    }

    .hi:hover {
        background-color: #ffc107;
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
    }

    .edit-button {
        background-color: #4CAF50; 
        margin-right: 10px;
    }

    .edit-button:hover {
        background-color: #45a049;
    }

    .delete-button {
        background-color: #f44336;
    }

    .delete-button:hover {
        background-color: #da190b;
    }

    .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        padding-top: 100px; 
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: rgba(0,0,0,0.4); 
    }

    .modal-content {
        background-color: rgba(255, 255, 255, 0.9); 
        margin: auto;
        padding: 40px; 
        border: 1px solid #888;
        width: 40%; 
        height: 70%; 
        overflow-y: auto; 
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .modal .custom-button {
        background-color: #28a745; 
        color: white;
        border: none;
        padding: 12px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
        transition-duration: 0.4s;
        border-radius: 5px;
    }

    .modal .custom-button:hover {
        background-color: white;
        color: black;
        border: 2px solid #28a745;
    }

    .modal .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .modal .close:hover,
    .modal .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .modal .form-control {
        font-size: 18px;
        height: 50px; 
    }

    .modal .close-button {
        background-color: #FF6347; 
        color: white;
        border: none;
        padding: 12px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
        transition-duration: 0.4s;
        border-radius: 5px;
    }

    .modal .close-button:hover {
        background-color: white;
        color: black;
        border: 2px solid #FF6347; 
    }
</style>


<script>
    
function showUpdateForm(product_id, category_id, category_name, product_name, description, price, image_url) {
    document.getElementById('update_product_id').value = product_id;
    document.getElementById('update_category_name').value = category_id;
    document.getElementById('update_product_name').value = product_name;
    document.getElementById('update_description').value = description;
    document.getElementById('update_price').value = price;
    document.getElementById('existing_image_url').value = image_url;
    document.getElementById('update_image').disabled = true;
    document.getElementById('update_image').style.display = 'none';
    document.getElementById('updateModal').style.display = 'block';
}


    function closeUpdateForm() {
        document.body.style.overflow = 'auto';  
        document.getElementById('updateModal').style.display = 'none';
    }

    function showAddForm() {
        document.body.style.overflow = 'hidden';  
        document.getElementById('addModal').style.display = 'block';
    }

    function closeAddForm() {
        document.body.style.overflow = 'auto';  
        document.getElementById('addModal').style.display = 'none';
    }
</script>

<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</section>
</html>