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
    $product_id = $_GET['product_id'];
    $sql = "SELECT p.name, p.description, p.price, p.image, c.name AS category_name
            FROM products p JOIN categories c ON p.category_id = c.category_id
            WHERE p.id = $product_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
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
                <form id="edit-profile" action="../Backend/edit_profile.php" method="post" enctype="multipart/form-data">
                    <div id="image-edit">
                        <img id="user-image" src="../Images/Edit product/image.png" alt="image">
                        <input id="file-upload" name="image" type="file" accept=".jpg,.png">
                    </div>
                    <label>Product Name</label>
                    <input type="text" value="<?php echo $row['name'] ?>">
                    <label>Email</label>
                    <input type="text">
                    <label>Phone number</label>
                    <input type="number">
                        
                    <label>Gender</label>
                    <div id="gender">
                        <input type="radio" name="gender">
                        <label>Male</label>
                        <input type="radio" name="gender">
                        <label>Female</label>
                        <input type="radio" name="gender">
                        <label>Other</label>
                    </div>
                    <label>Date of birth</label>
                    <input type="date">
                    <button id="save-profile" class="change-profile" type="submit">Save changes</button>
                </form>
                <form id="log-out" action="../Backend/log_out.php">
                        <button id="log-out-button" class="change-profile" type="submit">Log out</button>
                </form>
            </div>     
    </section>

    <?php
        include "./Components/info.php";
        include "./Components/footer.php";
    ?>
</body>
</html>

<?php 
    mysqli_close( $conn);
?>