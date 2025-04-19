<?php
    session_start();
    include "connect_db.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_id = $_SESSION['product_id'];
        $seller_id = $_SESSION['user_id'];

        $delete_product = 'DELETE FROM products WHERE id = ?';
        $delete_stmt = mysqli_prepare($conn, $delete_product);

        if ($delete_stmt) {
            mysqli_stmt_bind_param($delete_stmt,'i', $product_id);
            mysqli_stmt_execute($delete_stmt);
            echo "OK";

            // $delete_seller_product = 'DELETE FROM seller WHERE seller_id = ? AND product_id = ?';
            // $delete_seller_product_stmt = mysqli_prepare($conn, $delete_seller_product);



            // if ($delete_seller_product_stmt) {
            //     mysqli_stmt_bind_param($delete_seller_product_stmt,'ii', $seller_id, $product_id);
            //     mysqli_stmt_execute($delete_seller_product_stmt);
            //     echo "OK";
            // } else {
            //     echo "Error in delete seller";
            // }
        } else {
            echo "Error in delete";
        }
    }

    mysqli_close($conn);
?>