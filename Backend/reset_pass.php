<?php
    include "connect_db.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_SESSION['email'];

        $update = "UPDATE users
                   SET password = '$password'
                   WHERE email = '$email'";
        mysqli_query($conn, $update);
        header("location: ../Web pages/index.php?user=account");
        exit();
    }

    mysqli_close($conn);
?>
