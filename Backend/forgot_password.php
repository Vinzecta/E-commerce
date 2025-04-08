<?php
    include "connect_db.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $find_user = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $find_user);
        if (mysqli_num_rows($result) > 0) {
            $update = "UPDATE users
                       SET password = '$password'
                       WHERE email = '$email'";
            mysqli_query($conn, $update);
            header("location: ../Web pages/index.php?user=account");
            exit();
        } else {
            $_SESSION['error_forgot'] = '<div class="alert">
                                            <p>Email not found! Please try again</p>
                                        </div>';
            header("Location: ../Web pages/index.php?user=account&form=forgot_password");
            exit();
        }
    }
    mysqli_close($conn);
?>