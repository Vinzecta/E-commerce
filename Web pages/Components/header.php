<?php
    include "../Backend/connect_db.php";
    session_start();
    $image_link = "../Images/Header/user.png";
    if (isset($_SESSION['email'])) {
        $user_id = $_SESSION['user_id'];
        if (isset($_SESSION['image'])) {
            $image = $_SESSION['image'];
            $image_link = "../Images/User/" . $user_id . "/" . $image;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/header.css">
</head>
<body>
<header id="header">
        <h1 id="logo">Chocoley</h1>
        <nav id="navigation">
            <a href="index.php?page=home">HOME</a>
            <a href="index.php?page=product_service">PRODUCT/SERVICE</a>
            <a href="index.php?page=contact">CONTACT</a>
        </nav>
        <div id="icon_placer">
            <a href="index.php?page=account"><img id="user" src="<?php echo $image_link ?>" alt="user"></a>
        </div>
    </header>
</body>
</html>