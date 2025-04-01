<?php
    $page = 'home';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    else if (isset($_POST['page'])) {
        $page = $_POST['page'];
    }
    include "$page.php";
?>