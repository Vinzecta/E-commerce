<?php
    include "connect_db.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_name = $_POST['product_name'];
        $product_category = $_POST['category'];
        $product_description = $_POST['description'];
        $product_price = $_POST['price'];
        $user_id = $_SESSION['user_id'];
        $product_id = $_SESSION['product_id'];
        $find_category = "SELECT * FROM categories
                          WHERE name = '$product_category'";
        $find_category_query = mysqli_query($conn, $find_category);
        $find_category_row = mysqli_fetch_assoc($find_category_query);

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = $_FILES['image']['name'];
            $tmp_image = $_FILES['image']['tmp_name'];
            // $new_name = uniqid() . "_" . basename($image);
            $target_dir = '../Images/Seller/' .$user_id;
            $target_file = $target_dir . '/' . $image;

            if (!is_dir($target_dir)) {
                mkdir($target_dir,0777, true);
            }

            if (move_uploaded_file($tmp_image, $target_file)) {
                $update_product = "UPDATE products 
                                   SET name = '$product_name',
                                       description = '$product_description',
                                       price = '$product_price',
                                       category_id = {$find_category_row['category_id']},
                                       image = '$image'
                                    WHERE id = $product_id";

                mysqli_query($conn,$update_product);

                header("Location: ../Web pages/index.php?seller=product");
                exit;
            }
        } else {
            $update = "UPDATE products 
                       SET name = '$product_name',
                           description = '$product_description',
                           price = '$product_price',
                           category_id = {$find_category_row['category_id']}
                       WHERE id = $product_id";
            mysqli_query($conn, $update);
            header("location: ../Web pages/index.php?seller=product");
            exit;
        }
    }
?>