<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/add_product.css">
    <link rel="stylesheet" href="../Style/product.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Chocoley - Add Product</title>
</head>
<body>
    <?php
        include "./Components/header.php";
    ?>

    <section id="introduction">
        <h1>Add a New Product</h1>
        <p>Please fill the information below to add a new product!</p>
    </section>

    <form id="add-product">
        <p id="product-information">Product Information</p>

        <div id="product-image">
            <img src="../Images/Edit product/image.png" alt="image">
            <input type="file" accept=".jpg,.png">
        </div>

        <div id="form-input">
            <label>Product Name</label>
            <input type="text" placeholder="Enter Product Name">

            <label>Category</label>
            <select>
                <option>Category</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
            </select>

            <p>Have a new category? Please <span>Click here</span></p>
            <input type="text" placeholder="Enter New Category">
            <p>Return to Category Selection</p>

            <label>Description</label>
            <textarea placeholder="Enter Description"></textarea>

            <label>Price</label>
            <input type="number" placeholder="Enter Price">
        </div>
        <button type="submit">Add New Product</button>
    </form>

    <?php
        include "./Components/footer.php";
    ?>
</body>
</html>