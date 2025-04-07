<?php
    include "connect_db.php";

    session_start();

    $user_name = "";
    $password = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $user_name_sql = "SELECT user_name, email, password  FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $user_name_sql);

        if (mysqli_num_rows($result) > 0) {
            $account = mysqli_fetch_assoc($result);
            if (password_verify($password, $account['password'])) {
                $_SESSION['username'] = $account['user_name'];
                $_SESSION['email'] = $account['email'];
                header('location: ../Web pages/index.php?page=home');
                exit();
            } else {
                echo '<div class="alert">
                        <p>Username or password are incorrect! Please try again!</p>
                      </div>';
            }
        }
    };
?>