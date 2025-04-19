<?php
    include "../Backend/connect_db.php";

    $form = isset($_GET['form']) && in_array($_GET['form'], array('log_in', 'sign_up', 'forgot_password'))? $_GET['form'] : 'log_in';
    $display = isset($_GET['account_display']) && in_array($_GET['account_display'], array('profile', 'history', 'reset_password')) ? $_GET['account_display'] : 'profile';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Style/account.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Chocoley - Account</title>
</head>
<body>  
    <?php
        include "./Components/header.php";
    ?>

`   <h1 id="title">Account</h1>

    <?php if (isset($_SESSION['email'])): ?>
        <?php
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $profile = mysqli_fetch_assoc($result);
        ?>

        <section id="profile">
            <div id="left-profile">
                <div class="list-container" id="my-account">
                    <div class="profile-pic">
                        <img src="../Images/Header/user.png">
                    </div>
                    <a href="index.php?seller=account&account_display=profile">My Profile</a>
                </div>

                <div class="list-container" id="purchase-history">
                    <div class="profile-pic">
                        <img src="../Images/Header/user.png">
                    </div>
                    <a href="index.php?seller=account&account_display=history">Purchase History</a>
                </div>

                <div class="list-container" id="reset-password">
                    <div class="profile-pic">
                        <img src="../Images/Header/user.png">
                    </div>
                    <a href="index.php?seller=account&account_display=reset_password">Reset Password</a>
                </div>
            </div>

            <div id="right-profile">
                <?php if ($display == 'profile'):  ?>
                    <div class="right-content" id="right-account">
                        <div id="right-account-title">
                            <h1>My account</h1>
                        </div>
                        <form id="edit-profile" action="../Backend/edit_profile.php" method="post" enctype="multipart/form-data">
                            <div id="image-edit">
                                <?php if ($_SESSION['image'] == null): ?>
                                    <img id="user-image" src="../Images/Account/user.png" alt="user">
                                <?php else: ?>
                                    <img id="user-image" src="<?php echo '../Images/User/' . $profile['user_id'] . '/' . $_SESSION['image']; ?>" alt="user">
                                <?php endif; ?>
                                <input id="file-upload" name="image" type="file" accept=".jpg,.png">
                            </div>
                            <label>Username</label>
                            <input type="text" value=<?php echo $profile['user_name'] ?> disabled readonly>
                            <p style="text-align: center; padding: 0">You cannot change the username</p>
                            <label>Email</label>
                            <input type="text" value=<?php echo $profile['email'] ?> disabled readonly>
                            <p style="text-align: center; padding: 0">You cannot change the username</p>
                            <label>Phone number</label>
                            <input type="number" id="phone_number" name="phone_number" value=<?php echo $profile['phone_number'] ?>>
                                
                            <div class="alert alert-profile" style="display: none">
                                <p>Phone number must be 10-11 numbers!</p>
                            </div>

                            <label>Gender</label>
                            <div id="gender">
                                <input type="radio" name="gender" value="male" <?php if ($profile['gender'] == 'male') echo 'checked' ?>>
                                <label>Male</label>
                                <input type="radio" name="gender" value="female" <?php if ($profile['gender'] == 'female') echo 'checked' ?>>
                                <label>Female</label>
                                <input type="radio" name="gender" value="other" <?php if ($profile['gender'] == 'other') echo 'checked' ?>>
                                <label>Other</label>
                            </div>
                            <label>Date of birth</label>
                            <input type="date" name="birthdate" value=<?php echo $profile['birth_date'] ?>>
                            <button id="save-profile" class="change-profile" type="submit">Save changes</button>
                        </form>
                        <form id="log-out" action="../Backend/log_out.php">
                                <button id="log-out-button" class="change-profile" type="submit">Log out</button>
                        </form>
                    </div>
                    <script src="../JavaScript/profile_validation.js"></script>
                <?php elseif ($display == 'history'): ?>
                    <div class="right-content" id="right-history">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Purchase date</th>
                            </tr>
                        </table>
                    </div>
                <?php elseif ($display == 'reset_password'): ?>
                    <div class="right-content" id="right-reset">
                        <div id="right-reset-title">
                            <h1>Reset password</h1>
                        </div>
                        <form id="reset-pass" method="post" action="../Backend/reset_pass.php">
                            <label>New password</label>
                            <input id="profile-password" type="password" class="password" name="password" placeholder="Enter new password">

                            <div class="alert alert-profile" style="display: none">
                                <p>This field is required!</p>
                            </div>

                            <label>Re-type password</label>
                            <input id="profile-re-password" type="password" class="password" placeholder="Re-type password">

                            <div class="alert alert-profile" style="display: none">
                                <p>This field is required!</p>
                            </div>

                            <div class="alert alert-profile" style="display: none">
                                <p>Password does not match!</p>
                            </div>

                            <div class="show-password">
                                <input id="profile-show" type="checkbox" class="pass-show" value="yes">
                                <p>Show password</p>
                            </div>

                            <button id="change-pass-button" class="change-profile" type="submit">Save changes</button>
                        </form>
                        <script src="../JavaScript/profile_password_validation.js"></script>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <script src="../JavaScript/profile.js"></script>
    <?php endif; ?>

    <?php
        include "./Components/info.php";
        include "./Components/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.min.js" integrity="sha384-Re460s1NeyAhufAM5JwfIGWosokaQ7CH15ti6W5Y4wC/m4eJ5opJ2ivohxVM05Wd" crossorigin="anonymous"></script>
    <?php
        mysqli_close($conn);
    ?>
</body>
</html>