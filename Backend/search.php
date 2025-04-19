<?php
    session_start();

    include "connect_db.php";

    $input = $_POST['input'];
    $order_sql = $_SESSION['order_sql'];
    $product_per_page = $_SESSION['product_per_page'];
    $offset = $_SESSION['offset'];

    if (isset($_SESSION['role']) && $_SESSION['role'] == 'seller') {
        $user_id = $_SESSION['user_id'];
        $query = "SELECT s.seller_id, s.product_id, p.name, p.description, p.price, p.image, c.name AS category_name
                FROM seller s JOIN products p ON s.product_id = p.id JOIN categories c ON p.category_id = c.category_id 
                WHERE (p.name LIKE '{$input}%' OR p.description LIKE '{$input}%' OR c.name LIKE '{$input}%')
                AND s.seller_id = $user_id ORDER BY p.$order_sql LIMIT $product_per_page OFFSET $offset";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product">
                                <div class="product-image">
                                    <img id="user-image" src="../Images/Products/' . $row['image'] . '" alt="Chocolate">
                                </div>
                                <h1 class="product-name">' . $row['name'] . '</h1>
                                <p class="description">' . $row['description'] . '</p>
                                <p class="category"><b>Category:</b> ' . $row['category_name'] . '</p>
                                <div class="product-price">
                                    <h2 class="price">' . $row['price'] . ' USD</h2>
                                    <a href="index.php?seller=edit_product&product_id=' . $row['product_id'] . '">Edit</a>
                                </div>
                        </div>';
            }
        } else {
            echo '<p style="text-align: center; margin: 0;">No result found!</p>';
        }
    } else {
        $query = "SELECT p.name, p.description, p.price, p.image, c.name AS category_name
                FROM products p JOIN categories c ON p.category_id = c.category_id 
                WHERE (p.name LIKE '{$input}%' OR p.description LIKE '{$input}%' OR c.name LIKE '{$input}%')
                ORDER BY p.$order_sql LIMIT $product_per_page OFFSET $offset";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product">
                                <div class="product-image">
                                    <img src="../Images/Products/' .$row['image']. '" alt="white-chocolate">
                                </div>
                                <h1 class="product-name">' .$row['name']. '</h1>
                                <p class="description">'.$row['description']. '</p>
                                <p class="category"><b>Category:</b> ' .$row['category_name'].'</p>
                                <div class="product-price">
                                    <h2 class="price">' .$row['price']. ' USD</h2>
                                    <a href="index.php?user=product_detail">View</a>
                                </div>
                            </div>';
            }
        } else {
            echo '<p style="text-align: center; margin: 0;">No result found!</p>';
        }
    }
?>