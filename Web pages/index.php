<?php
    session_start();
    $page = "home";

    if (isset($_GET['user'])) {
        $page = $_GET['user'];
        include "./User/$page.php";
    } else if (isset($_GET['seller'])) {
        $page = $_GET['seller'];
        include "./Seller/$page.php";
    } else {
        include "./User/home.php";
    }
?>