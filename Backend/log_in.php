<?php
    include "connect_db.php";

    session_start();

    $user_name = "";
    $password = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $user_name_sql = "SELECT user_id, user_name, email, password, role , profile_image FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $user_name_sql);

        if (mysqli_num_rows($result) > 0) {
            $account = mysqli_fetch_assoc($result);
            if (password_verify($password, $account['password'])) {
                $_SESSION['username'] = $account['user_name'];
                $_SESSION['email'] = $account['email'];
                $_SESSION['user_id'] = $account['user_id'];
                $_SESSION['image'] = $account['profile_image'];
                $_SESSION['role'] = $account['role'];

                if ($account['role'] == 'seller') {
                    header("Location: ../Web pages/index.php?seller=home");
                    exit();
                } else {
                    header('location: ../Web pages/index.php?user=home');
                    exit();
                }
            } else {
                $_SESSION['error_login'] = '<div class="alert">
                        <p>Username or password are incorrect! Please try again!</p>
                      </div>';
                header("Location: ../Web pages/index.php?user=account");
                exit();
            }
        } else {
            $_SESSION['error_login'] = '<div class="alert">
                                    <p>Username or password are incorrect! Please try again!</p>
                                  </div>';
            header("Location: ../Web pages/index.php?user=account");
            exit();
        }
    };

    mysqli_close($conn);
?>