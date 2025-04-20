<?php
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'seller') {
        header('Location: ../Web pages/index.php?user=home');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Style/not_found.css">
    <title>Chocoley - Not found</title>
</head>
<body>
    <?php
        include "./Components/header.php";
    ?>

    <section id="not_found">
        <h1>Page Not Found!</h1>
        <p>You may enter the wrong page!</p>
        <p>Please <span><a href="index.php?seller=home">Click here</a></span> to navigate to homepage</p>
    </section>
    <?php
        include "./Components/footer.php";
    ?>
</body>
</html>