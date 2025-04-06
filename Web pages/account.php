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

    <section id="profile" style="display: none">
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
                <form id="edit-profile">
                    <div id="image-edit">
                        <img id="user-image" src="../Images/Account/user.png" alt="user">
                        <input id="file-upload" type="file" accept=".jpg,.png">
                    </div>
                    <label>Username</label>
                    <input type="text" value="Vinzecta" disabled readonly>
                    <p style="text-align: center; padding: 0">You cannot change the username</p>
                    <label>Name</label>
                    <input type="text" placeholder="Enter name">
                    <label>Email</label>
                    <input type="text" value="lmao@gmail.com">
                    <label>Phone number</label>
                    <input type="text" placeholder="Enter phone number">
                    <label>Gender</label>
                    <div id="gender">
                        <input type="radio">
                        <label>Male</label>
                        <input type="radio">
                        <label>Female</label>
                        <input type="radio">
                        <label>Other</label>
                    </div>
                    <label>Date of birth</label>
                    <input type="date">
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
                <form id="reset-pass">
                    <label>New password</label>
                    <input type="text" class="password" placeholder="Enter new password">
                    <label>Re-type password</label>
                    <input type="text" class="password" placeholder="Re-type password">
                    <div class="show-password">
                        <input type="checkbox">
                        <p>Show password</p>
                    </div>

                    <button class="change-profile" type="submit">Save changes</button>
                </form>
            </div>
        </div>
    </section>

    <section id="credential">
            <div id="option">
                <p id="login">Log in</p>
                <p id="signup">Sign up</p>
            </div>
            <form id="sign-in" class="credential-form">
                <label for="username">Username or E-mail address</label>
                <input type="text" class="username" placeholder="Enter username / Email address">

                <div class="alert" style="display: none">
                    <p>This field is required!</p>
                </div>

                <label for="password">Password</label>
                <input type="password" class="password" placeholder="Enter password">

                <div class="alert" style="display: none">
                    <p>This field is required!</p>
                </div>

                <div class="show-password">
                    <input type="checkbox">
                    <p>Show password</p>
                </div>
                <p id="forgot">Forgot password?</p>
                <a href="index.php?page=home">Sign in</a>
            </form>

            <form id="sign-up" class="credential-form" style="display: none">
                <label for="username">Username</label>
                <input type="text" class="username" placeholder="Enter username">

                <div class="alert" style="display: none">
                    <p>This field is required!</p>
                </div>

                <label for="email">Email</label>
                <input type="text" class="email" placeholder="Enter email">

                <div class="alert" style="display: none">
                    <p>This field is required!</p>
                </div>

                <div class="alert" style="display: none">
                    <p>Please enter a valid email address</p>
                </div>

                <label for="password">Password</label>
                <input type="password" class="password" placeholder="Enter password">

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
                    <input type="checkbox">
                    <p>Show password</p>
                </div>
                <a href="index.php?page=home">Sign up</a>
            </form>

            <form id="forgot-password" class="credential-form" style="display: none">
                <div id="instruction">
                    <h2>Forget your password?</h2>
                    <p>Type your email and new password!</p>
                </div>
                <label for="email">Email</label>
                <input type="text" class="email" placeholder="Enter email">
                <label for="password">Password</label>
                <input type="password" class="password" placeholder="Enter password">
                <label for="retype_password">Re-type password</label>
                <input type="password" class="password" placeholder="Re-type password">
                <div class="show-password">
                    <input type="checkbox">
                    <p>Show password</p>
                </div>
                <a href="index.php?page=account">Submit</a>
                <div id="return-section">
                    <p>Remember your password?</p>
                    <p id="login-return">Return to login</p>
                </div>
            </form>
    </section>

    <?php
        include "./Components/info.php";
        include "./Components/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.min.js" integrity="sha384-Re460s1NeyAhufAM5JwfIGWosokaQ7CH15ti6W5Y4wC/m4eJ5opJ2ivohxVM05Wd" crossorigin="anonymous"></script>
    <script src="../JavaScript/account.js"></script>
</body>
</html>