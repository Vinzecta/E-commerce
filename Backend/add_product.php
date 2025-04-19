<?php
    session_start();

    include "connect_db.php";

    function add_seller($conn, $user_id, $product_id) {
        $add_product_seller_sql = 'INSERT INTO seller VALUES (?, ?)';
        $stmt = mysqli_prepare($conn, $add_product_seller_sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt,'ii', $user_id, $product_id);
            mysqli_stmt_execute($stmt);
            $_SESSION['success'] = '<div class="success success-profile">
                                        <p>Add product successfully</p>
                                    </div>';
            header("Location: ../Web pages/index.php?seller=add_product");
            exit();
        } else {
            echo 'Error in insert seller';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_name = $_POST['name'];
        $category = $_POST['category'];
        $new_category = trim($_POST['new_category']);
        $description = $_POST['description'];
        $price = $_POST['price'];
        $user_id = $_SESSION['user_id'];
        $product_id = 0;

        if ($category == 'Category' && $new_category == null) {
            $_SESSION['error'] = '<div class="alert alert-profile">
                                    <p>Please select a category!</p>
                                    </div>';
            header('Location: ../Web pages/index.php?seller=add_product');
            exit();
        }

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = $_FILES['image']['name'];
            $tmp_image = $_FILES['image']['tmp_name'];
            // $new_name = uniqid() . "_" . basename($image);
            $target_dir = '../Images/Products/';
            $target_file = $target_dir . '/' . $image;

            if (!is_dir($target_dir)) {
                mkdir($target_dir,0777, true);
            }

            if (move_uploaded_file($tmp_image, $target_file)) {
                if ($new_category == null) {
                    $category_search = "SELECT category_id FROM categories WHERE name = ?";
                    $stmt = mysqli_prepare($conn, $category_search);

                    if($stmt) {
                        mysqli_stmt_bind_param($stmt, "s", $category);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_assoc($result);

                        $add_product_sql = "INSERT INTO products (name, description, price, category_id, image) VALUES (?, ?, ?, ?, ?)";
                        $stmt = mysqli_prepare($conn, $add_product_sql);

                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt,"ssdis", $product_name, $description, $price, $row['category_id'], $image);
                            mysqli_stmt_execute($stmt);
                            $product_id = mysqli_insert_id($conn);
                            add_seller($conn,$user_id, $product_id);
                        } else {
                            echo 'Error in insert';
                        }
                    } else {
                        echo 'Error in finding id';
                    }
                } else {
                    $find_category_sql = "SELECT category_id FROM categories WHERE name = ?" ;
                    $stmt = mysqli_prepare($conn, $find_category_sql);

                    if($stmt) {
                        mysqli_stmt_bind_param($stmt,"s", $new_category);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            $add_product_sql = "INSERT INTO products (name, description, price, category_id, image) VALUES (?, ?, ?, ?, ?)";
                            $stmt = mysqli_prepare($conn, $add_product_sql);

                            if ($stmt) {
                                mysqli_stmt_bind_param($stmt,"ssdis", $product_name, $description, $price, $row['category_id'], $image);
                                mysqli_stmt_execute($stmt);
                                $product_id = mysqli_insert_id($conn);
                                add_seller($conn,$user_id, $product_id);
                            } else {
                                echo 'Error in insert';
                            }
                        } else {
                            $add_category_sql = 'INSERT INTO categories (name) VALUES (?)';
                            $stmt = mysqli_prepare($conn, $add_category_sql);

                            if ($stmt) {
                                mysqli_stmt_bind_param($stmt,'s', $new_category);
                                mysqli_stmt_execute($stmt);
                                $category_id = mysqli_insert_id($conn);

                                $add_product_sql = "INSERT INTO products (name, description, price, category_id, image) VALUES (?, ?, ?, ?, ?)";
                                $stmt = mysqli_prepare($conn, $add_product_sql);

                                if ($stmt) {
                                    mysqli_stmt_bind_param($stmt,"ssdis", $product_name, $description, $price, $category_id, $image);
                                    mysqli_stmt_execute($stmt);
                                    $product_id = mysqli_insert_id($conn);
                                    add_seller($conn,$user_id, $product_id);
                                } else {
                                    echo 'Error in insert';
                                }
                            }
                        }
                    }
                }
            }
        } else {
            echo 'Error import image';
        }
    }

    mysqli_close($conn);
?>