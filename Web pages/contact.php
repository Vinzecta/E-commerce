<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        include "./Components/header.php";
    ?>

    <h1 id="title">Contact Us</h1>

    <section id="contact">
        <div id="contact-left">
            <div id="contact-image">
                <img src="../Images/Contact/white_chocolate.jpg" alt="White chocolate">
            </div>

            <h2 id="contact-title">Contact Information</h2>

            <div id="contact-info">
                <div id="office">
                    <h3>Office</h3>
                    <p id="address">abc Ho Chi Minh City</p>
                    <p id="phone-number">0123456789</p>
                    <p id="gmail">vinhtran23042004@gmail.com</p>
                </div>

                <div id="social-media-section">
                    <h3>Social Media</h3>
                    <div id="social-image">
                        <img src="../Images/Contact/facebook.png" alt="Facebook">
                        <img src="../Images/Contact/instagram.png" alt="Instagram">
                    </div>
                </div>
            </div>
        </div>

        <div id="contact-right">
            <h2>Got Any Question?</h2>
            <p>Use the form below to contact with us!</p>

            <form id="contact-form">
                <label>Email</label>
                <input type="text" placeholder="Enter email">
                <label>Title</label>
                <input type="text" placeholder="Enter the contact title">
                <label>Message</label>
                <input type="text" placeholder="Enter the message">
                <button id="submit-contact" type="submit">Submit</button>
            </form>
        </div>
    </section>

    <?php
        include "./Components/info.php";
        include "./Components/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.min.js" integrity="sha384-Re460s1NeyAhufAM5JwfIGWosokaQ7CH15ti6W5Y4wC/m4eJ5opJ2ivohxVM05Wd" crossorigin="anonymous"></script>
</body>
</html>