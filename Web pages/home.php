<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Style/home.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Chocoley - Home</title>
</head>
<body>    
    <script src="../JavaScript/home.js"></script>

    <?php
        include "./Components/header.php";
    ?>

    <section id="contact">
        <div id="contact_text">
            <h3 id="contact_sub_title">Chocoley Fine Chocolates</h3>
            <h1 id="contact_main_title">Indulge in the Art of Chocolate</h1>
            <p id="contact_content">We believe that exceptional chocolate elevates every moment. With a passion for quality and craftsmanship, we create rich, decadent treats that delight your senses and bring pure joy to every bite.</p>
            <a id="contact_nav" href="index.php?page=contact">Contact Now</a>
        </div>
        <div id="banner_image">
            <img id="chocolate" src="../Images/Home/Chocolate.jpg" alt="Chocolate banner">
        </div>
    </section>

    <section id="slideshow">
        <div class="left-slideshow">
            <div id="left-slideshow-1" class="left-slideshow-content">
                <img src="../Images/Home/Chocolate_2.jpg" alt="Chocolate 2" class="chocolate-2">
                <p class="slideshow-text">From rich, velvety truffles to artisanal chocolate bars, our handcrafted creations bring indulgence, quality, and joy to every bite. We blend flavor with artistry to create chocolates that reflect your taste and passion for the finest treats.</p>
                <a class="product_service" href="index.php?page=product_service">View Product/Services</a>
            </div>
            <div id="left-slideshow-2" class="left-slideshow-content">
                <img src="../Images/Home/Chocolate 3.jpg" alt="Chocolate 3" class="chocolate-2">
                <p class="slideshow-text">Elevate your chocolate experience with unique, custom-crafted treats. From decadent pralines to hand-painted bonbons, we create personalized confections that perfectly match your taste and desires.</p>
                <a class="product_service" href="index.php?page=product_service">View Product/Services</a>
            </div>
            <div id="left-slideshow-3" class="left-slideshow-content">
                <img src="../Images/Home/Chocolate flavor.jpg" alt="Chocolate flavor" class="chocolate-2">
                <p class="slideshow-text">Minimalist chocolates celebrate pure flavors, elegant simplicity, and refined craftsmanship. We embrace the “less is more” philosophy, creating delicacies that are both understated and irresistibly indulgent.</p>
                <a class="product_service" href="index.php?page=product_service">View Product/Services</a>
            </div>
            <div id="left-slideshow-4" class="left-slideshow-content">
                <img src="../Images/Home/Eat chocolate.jpg" alt="Eat chocolate" class="chocolate-2">
                <p class="slideshow-text">For those who crave indulgence, our luxury chocolate collection features the finest ingredients, exquisite craftsmanship, and decadent flavors. We create sophisticated confections that exude elegance and exclusivity.</p>
                <a class="product_service" href="index.php?page=product_service">View Product/Services</a>
            </div>
        </div>
        <div class="right-slideshow">
            <div class="slideshow-title" id="slideshow-1">
                <p class="number">01</p>
                <h1>Exquisite Chocolates</h1>
            </div>
            <div class="slideshow-title" id="slideshow-2">
                <p class="number">02</p>
                <h1>Custom Creations</h1>
            </div>
            <div class="slideshow-title" id="slideshow-3">
                <p class="number">03</p>
                <h1>Pure & Simple Flavors</h1>
            </div>
            <div class="slideshow-title" id="slideshow-4">
                <p class="number">04</p>
                <h1>Luxury Indulgence</h1>
            </div>
        </div>
    </section>

    <?php
        include "./Components/info.php";
        include "./Components/footer.php";
    ?>
</body>
</html>