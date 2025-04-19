<?php
    include "../Backend/connect_db.php";
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
        <?php if (isset($_SESSION['role'])): ?>
            <?php if ($_SESSION['role'] == 'user'): ?>
                <nav id="navigation">
                    <a href="index.php?user=home">HOME</a>
                    <a href="index.php?user=product_service">PRODUCT/SERVICE</a>
                    <a href="index.php?user=contact">CONTACT</a>
                </nav>
                <div id="icon_placer">
                    <a href="index.php?user=account"><img id="user" src="<?php echo $image_link ?>" alt="user"></a>
                </div>
            <?php elseif ($_SESSION['role'] == 'seller'): ?>
                <nav id="navigation">
                    <a href="index.php?seller=home">HOME</a>
                    <a href="index.php?seller=product">YOUR PRODUCTS</a>
                </nav>
                <div id="icon_placer">
                    <a href="index.php?seller=account"><img id="user" src="<?php echo $image_link ?>" alt="user"></a>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <nav id="navigation">
                <a href="index.php?user=home">HOME</a>
                <a href="index.php?user=product_service">PRODUCT/SERVICE</a>
                <a href="index.php?user=contact">CONTACT</a>
            </nav>
            <div id="icon_placer">
                <a href="index.php?user=account"><img id="user" src="<?php echo $image_link ?>" alt="user"></a>
            </div>
        <?php endif; ?>
    </header>
</body>
</html>