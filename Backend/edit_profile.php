<?php
    include "connect_db.php";
    session_start();

    $image = $email = $phone_number = $gender = $birth_date = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_SESSION['email'];
        $phone_number = $_POST['phone_number'];
        $gender = $_POST['gender'];
        $birth_date = $_POST['birthdate'];

        $search_info = "SELECT user_id FROM users WHERE email = '$email'";
        $query = mysqli_query($conn, $search_info);
        $result = mysqli_fetch_assoc($query);
        echo $_FILES['image']['error'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = $_FILES['image']['name'];
            $tmp_image = $_FILES['image']['tmp_name'];
            $new_name = uniqid() . "_" . basename($image);
            $target_dir = '../Images/User/' .$result["user_id"];
            $target_file = $target_dir . '/' . $new_name;

            if (!is_dir($target_dir)) {
                mkdir($target_dir,0777, true);
            }

            if (move_uploaded_file($tmp_image, $target_file)) {
                $update = "UPDATE users
                           SET phone_number = '$phone_number',
                               gender = '$gender',
                               birth_date = '$birth_date',
                               profile_image = '$new_name'
                            WHERE email = '$email'";
                mysqli_query($conn, $update);
                header("location: ../Web pages/index.php?page=account");
                exit;
            } else {echo "OK";}
        } else echo "OK";
    }

    mysqli_close($conn);
?>