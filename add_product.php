<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection
include 'connection.php';

// Fetch all categories
$categories_sql = "SELECT * FROM categories";
$categories_result = $conn->query($categories_sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_url = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = "INSERT INTO products (Category_id, Product_name, Description, Price, Image_url) VALUES ('$category_id', '$product_name', '$description', '$price', '$image_url')";
    $conn->query($sql);

    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .form-container h3 {
            color: #333;
        }
        .form-group label {
            font-size: 18px;
            color: #333;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
        }
        .form-control-lg {
            height: calc(2.5em + .75rem + 2px);
            font-size: 1.25rem;
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
            margin-top: 10px;
        }
        .custom-button:hover {
            background-color: #ffc107;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h3>Add New Product</h3>
            <form action="add_product.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select class="form-control form-control-lg" id="category_id" name="category_id" required>
                        <?php while ($category = $categories_result->fetch_assoc()): ?>
                            <option value="<?= $category['Category_id'] ?>"><?= htmlspecialchars($category['Category_name']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" class="form-control form-control-lg" id="product_name" name="product_name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control form-control-lg" id="description" name="description" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control form-control-lg" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control form-control-lg" id="image" name="image" required>
                </div>
                <button type="submit" class="custom-button">Add Product</button>
            </form>
        </div>
    </div>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
