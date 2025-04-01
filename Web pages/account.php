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
    <script src="../JavaScript/account.js"></script>
    <?php
        include "./Components/header.php";
    ?>

`   <h1 id="title">Account</h1>

    <section id="credential">
            <div id="option">
                <p id="login">Log in</p>
                <p id="signup">Sign up</p>
            </div>
            <form id="sign-in" class="credential-form" >
                <label for="username">Username or E-mail address</label>
                <input type="text" class="username" placeholder="Enter username / Email address">
                <label for="password">Password</label>
                <input type="password" class="password" placeholder="Enter password">
                <div class="show-password">
                    <input type="checkbox">
                    <p>Show password</p>
                </div>
                <p id="forgot">Forgot password?</p>
                <a href="index.php?page=home">Log in</a>
            </form>

            <form id="sign-up" class="credential-form">
                <label for="username">Username</label>
                <input type="text" class="username" placeholder="Enter username">
                <label for="email">Email</label>
                <input type="text" class="email"placeholder="Enter email">
                <label for="password">Password</label>
                <input type="password" class="password" placeholder="Enter password">
                <label for="retype_password">Re-type password</label>
                <input type="password" class="re-type-password" placeholder="Re-type password">
                <div class="show-password">
                    <input type="checkbox">
                    <p>Show password</p>
                </div>
                <a href="index.php?page=home">Sign up</a>
            </form>
    </section>

    <?php
        include "./Components/info.php";
        include "./Components/footer.php";
    ?>
</body>
</html>