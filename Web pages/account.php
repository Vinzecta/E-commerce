<?php
    include "../Backend/connect_db.php";
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

    <?php session_start(); if (isset($_SESSION['email'])): ?>
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
                    <p>My Profile</p>
                </div>

                <div class="list-container" id="purchase-history">
                    <div class="profile-pic">
                        <img src="../Images/Header/user.png">
                    </div>
                    <p>Purchase History</p>
                </div>

                <div class="list-container" id="reset-password">
                    <div class="profile-pic">
                        <img src="../Images/Header/user.png">
                    </div>
                    <p>Reset Password</p>
                </div>
            </div>

            <div id="right-profile">
                <div class="right-content" id="right-account">
                    <div id="right-account-title">
                        <h1>My account</h1>
                    </div>
                    <form id="edit-profile" action="../Backend/edit_profile.php" method="post" enctype="multipart/form-data">
                        <div id="image-edit">
                            <img id="user-image" src="../Images/Account/user.png" alt="user">
                            <input id="file-upload" name="image" type="file" accept=".jpg,.png">
                        </div>
                        <label>Username</label>
                        <input type="text" value=<?php echo $profile['user_name'] ?> disabled readonly>
                        <p style="text-align: center; padding: 0">You cannot change the username</p>
                        <label>Email</label>
                        <input type="text" value=<?php echo $profile['email'] ?> disabled readonly>
                        <p style="text-align: center; padding: 0">You cannot change the username</p>
                        <label>Phone number</label>
                        <input type="text" name="phone_number" placeholder="Enter phone number">
                        <label>Gender</label>
                        <div id="gender">
                            <input type="radio" name="gender" value="male">
                            <label>Male</label>
                            <input type="radio" name="gender" value="female">
                            <label>Female</label>
                            <input type="radio" name="gender" value="other">
                            <label>Other</label>
                        </div>
                        <label>Date of birth</label>
                        <input type="date" name="birthdate">
                        <button class="change-profile" type="submit">Save changes</button>
                    </form>
                </div>

                <div class="right-content" id="right-history" style="display: none">
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

                <div class="right-content" id="right-reset" style="display: none">
                    <div id="right-reset-title">
                        <h1>Reset password</h1>
                    </div>
                    <form id="reset-pass" method="post" action="../Backend/reset_pass.php">
                        <label>New password</label>
                        <input type="password" class="password" name="password" placeholder="Enter new password">
                        <label>Re-type password</label>
                        <input type="password" class="password" placeholder="Re-type password">
                        <div class="show-password">
                            <input type="checkbox" class="pass-show" value="yes">
                            <p>Show password</p>
                        </div>

                        <button class="change-profile" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section id="credential">
                <div id="option">
                    <p id="login">Log in</p>
                    <p id="signup">Sign up</p>
                </div>
                <form id="sign-in" action="../Backend/log_in.php" method="post" class="credential-form">
                    <label for="username">E-mail address</label>
                    <input type="text" name="email" class="username" placeholder="Email address">

                    <div class="alert" style="display: none">
                        <p>This field is required!</p>
                    </div>

                    <label for="password">Password</label>
                    <input type="password" name="password" class="password" placeholder="Enter password">

                    <div class="alert" style="display: none">
                        <p>This field is required!</p>
                    </div>

                    <div class="show-password">
                        <input type="checkbox" class="pass-show" value="yes">
                        <p>Show password</p>
                    </div>
                    <p id="forgot">Forgot password?</p>
                    <button type="submit">Sign in</button>
                </form>

                <form id="sign-up" action="../Backend/sign_up.php" method="post" class="credential-form" style="display: none">
                    <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                    <label for="username">Username</label>
                    <input type="text" name="username" class="username" placeholder="Enter username">

                    <div class="alert" style="display: none">
                        <p>This field is required!</p>
                    </div>

                    <label for="email">Email</label>
                    <input type="text" name="email" class="email" placeholder="Enter email">

                    <label for="role">Role</label>
                    <select name="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="seller">Seller</option>
                    </select>

                    <div class="alert" style="display: none">
                        <p>This field is required!</p>
                    </div>

                    <div class="alert" style="display: none">
                        <p>Please enter a valid email address</p>
                    </div>

                    <label for="password">Password</label>
                    <input type="password" name="password" class="password" placeholder="Enter password">

                    <div class="alert" style="display: none">
                        <p>This field is required!</p>
                    </div>

                    <label for="retype_password">Re-type password</label>
                    <input type="password" class="password" placeholder="Re-type password">

                    <div class="alert" style="display: none">
                        <p>This field is required!</p>
                    </div>

                    <div class="alert" style="display: none">
                        <p>Password does not match!</p>
                    </div>

                    <div class="show-password">
                        <input type="checkbox" class="pass-show" value="yes">
                        <p>Show password</p>
                    </div>
                    <button type="submit">Sign up</button>
                </form>

                <form id="forgot-password" class="credential-form" action="../Backend/forgot_password.php" method="post" style="display: none">
                    <div id="instruction">
                        <h2>Forget your password?</h2>
                        <p>Type your email and new password!</p>
                    </div>
                    <label for="email">Email</label>
                    <input type="text" name="email" class="email" placeholder="Enter email">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="password" placeholder="Enter password">
                    <label for="retype_password">Re-type password</label>
                    <input type="password" class="password" placeholder="Re-type password">
                    <div class="show-password">
                        <input type="checkbox" class="pass-show" value="yes">
                        <p>Show password</p>
                    </div>
                    <button type="submit">Submit</button>
                    <div id="return-section">
                        <p>Remember your password?</p>
                        <p id="login-return">Return to login</p>
                    </div>
                </form>
        </section>
    <?php endif; ?>

    <?php
        include "./Components/info.php";
        include "./Components/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.min.js" integrity="sha384-Re460s1NeyAhufAM5JwfIGWosokaQ7CH15ti6W5Y4wC/m4eJ5opJ2ivohxVM05Wd" crossorigin="anonymous"></script>
    <script src="../JavaScript/account.js"></script>
    <script src="../JavaScript/profile.js"></script>

    <?php
        mysqli_close($conn);
    ?>
</body>
</html>