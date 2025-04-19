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
            <img id="user-image" src="../Images/Edit product/image.png" alt="image">
            <input id="file-upload" type="file" accept=".jpg,.png">
        </div>

        <div id="form-input">
            <label>Product Name</label>
            <input id="product-name" type="text" placeholder="Enter Product Name">

            <div class="alert alert-profile" style="display: none">
                <p>This field is required!</p>
            </div>

            <div class="alert alert-profile" style="display: none">
                <p>Product name must have between 1 - 30 characters!</p>
            </div>

            <label>Category</label>
            <div id="old-cate">
                <select id="category-select">
                    <option>Category</option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                </select>

                <p>Have a new category? Please <span id="to-new-cate">Click here</span></p>
            </div>

            <div id="new-category" style="display: none">
                <input id="new-cate" type="text" placeholder="Enter New Category">

                <div class="alert alert-profile" style="display: none">
                    <p>This field is required!</p>
                </div>

                <div class="alert alert-profile" style="display: none">
                    <p>Category name must have between 1 - 30 characters!</p>
                </div>

                <p id="selection-return">Return to Category Selection</p>
            </div>

            <label>Description</label>
            <textarea placeholder="Enter Description"></textarea>

            <div class="alert alert-profile" style="display: none">
                <p>This field is required!</p>
            </div>

            <div class="alert alert-profile" style="display: none">
                <p>Description must have between 1 - 200 characters</p>
            </div>

            <label>Price</label>
            <input type="number" placeholder="Enter Price">

            <div class="alert alert-profile" style="display: none">
                <p>This field is required!</p>
            </div>

            <div class="alert alert-profile" style="display: none">
                <p>Price must not be negative</p>
            </div>
        </div>
        <button type="submit">Add New Product</button>
    </form>

    <?php
        include "./Components/footer.php";
    ?>

    <script src="../JavaScript/add_product.js"></script>
</body>
</html>