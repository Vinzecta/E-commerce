<?php
    session_start();
    $page = "home";
    

    if (isset($_GET['user'])) {
        if (in_array($_GET['user'], array('account', 'contact', 'home', 'product_service'))) {
            $page = $_GET['user'];
            include "./User/$page.php";
        } else {
            include "./User/not_found.php";
        }
    } else if (isset($_GET['seller'])) {
        $page = $_GET['seller'];
        include "./Seller/$page.php";
    } else {
        include "./User/home.php";
    }
?>