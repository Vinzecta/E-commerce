<?php
    include "connect_db.php";

    session_start();

    $username = $email = $role = $password = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);

        $check = "SELECT email FROM users WHERE email = '$email'";
        $check_result = mysqli_query($conn, $check);
        if (mysqli_num_rows($check_result) == 0) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $insert = "INSERT INTO users (email, password, user_name, role) VALUES ('$email', '$password', '$username', '$role')";
            mysqli_query($conn, $insert);
            header("location: ../Web pages/index.php?page=account");
            exit;
        } else {
            header("location: ../Web pages/index.php?page=account");
            $_SESSION['error'] = '<div class="alert">
                                    <p>Email already used! Please try again!</p>
                                  </div>';
        }
    }
    mysqli_close($conn);
?>