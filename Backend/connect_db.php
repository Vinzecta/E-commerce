<?php
    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $db_name = "chocoley";

    $conn = mysqli_connect($server_name, $user_name, $password, $db_name);

    if (!$conn) {
        die("". mysqli_connect_error());
    }
?>