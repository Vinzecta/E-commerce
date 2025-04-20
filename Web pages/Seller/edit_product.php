<?php
    if (isset($_SESSION['email'])) {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'user') {
                header("Location: ../Web pages/index.php?user=home");
                exit();
            }
        }
    }
?>

<?php
    include "../Backend/connect_db.php";
    $seller_id = $_SESSION['user_id'];
    $product_id = $_GET['product_id'];
    $_SESSION['product_id'] = $product_id;
    $sql = "SELECT p.id, p.name, p.description, p.price, p.image, c.name AS category_name
            FROM products p JOIN categories c ON p.category_id = c.category_id
            WHERE p.id = $product_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['id'] == null) {
        header("Location: ../Web pages/index.php?seller=product");
    }

    $category = "SELECT * FROM categories";
    $category_query = mysqli_query($conn, $category);

    $_SESSION['product_id'] = $_GET['product_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/product.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Chocoley Seller - Edit Product</title>
</head>
<body>
    <?php
        include "./Components/header.php";
    ?>
    <h1 id="edit-title">Edit Product</h1>
    <section id="profile">
        <div id="right-profile">
            <div class="right-content" id="right-account">
                <div id="right-account-title">
                    <h1>Product Detail</h1>
                </div>
                <form id="edit-profile" action="../Backend/edit_product.php" method="post" enctype="multipart/form-data">
                    <div id="image-edit">
                        <img id="user-image" src="../Images/Products/<?php echo $row['image']; ?>" alt="image">
                        <input id="file-upload" name="image" type="file" accept=".jpg,.png">
                    </div>
                    <label>Product Name</label>
                    <input id="product-name" type="text" name="product_name" value="<?php echo $row['name'] ?>">

                    <div class="alert alert-profile" style="display: none">
                        <p>This field is required!</p>
                    </div>

                    <div class="alert alert-profile" style="display: none">
                        <p>Product name must have between 1 - 30 characters!</p>
                    </div>

                    <label>Category</label>
                    <select name="category">
                        <?php
                            while ($category_row = mysqli_fetch_assoc($category_query)) {
                                $selected = ($category_row['name'] == $row['category_name']) ? 'selected' : '';
                                echo '<option value="' . $category_row['name'] . '" ' . $selected . '>' . $category_row['name'] . '</option>';
                            }
                        ?>
                    </select>
                    <label>Description</label>
                    <textarea id="product-description" name="description"><?php echo $row['description'] ?></textarea>

                    <div class="alert alert-profile" style="display: none">
                        <p>This field is required!</p>
                    </div>

                    <div class="alert alert-profile" style="display: none">
                        <p>Description must have between 1 - 200 characters</p>
                    </div>

                    <label>Price</label>
                    <input id="product-price" type="number" name="price" step="0.01" min="0" value="<?php echo $row['price']?>">

                    <div class="alert alert-profile" style="display: none">
                        <p>This field is required!</p>
                    </div>

                    <div class="alert alert-profile" style="display: none">
                        <p>Price must not be negative</p>
                    </div>
                    <button id="submit-product" class="change-profile" type="submit">Save Changes</button>
                </form>

                <form method="post" action="../Backend/delete_product.php">
                        <button id="delete-product" type="submit">Delete Product</button>
                </form>    
            </div>     
    </section>

    <script src="../JavaScript/edit_product.js"></script>

    <?php
        include "./Components/footer.php";
    ?>

    <!-- <script src="../JavaScript/profile.js"></script> -->
</body>
</html>

<?php 
    mysqli_close( $conn);
?>