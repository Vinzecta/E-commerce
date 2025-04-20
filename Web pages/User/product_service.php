<?php
    if (isset($_SESSION['email'])) {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'seller') {
                header("Location: ../Web pages/index.php?seller=home");
                exit();
            }
        }
    }
?>

<?php
    include "../Backend/connect_db.php";
    $page = isset($_GET['page_number']) && is_numeric($_GET['page_number'])? (int)($_GET['page_number']) : 1;
    $product_per_page = 12;
    $offset = ($page - 1) * $product_per_page;

    $order = isset($_GET['order']) && in_array($_GET['order'], array('DESC','ASC')) ? $_GET['order'] : 'ASC';
    $order_name = isset($_GET['order_name']) && in_array($_GET['order_name'], array('name','price')) ? $_GET['order_name'] : 'name';
    $order_sql = "$order_name $order";

    $_SESSION['order_sql'] = $order_sql;
    $_SESSION['product_per_page'] = $product_per_page;
    $_SESSION['offset'] = $offset;

    $sql = "SELECT p.name, p.description, p.price, p.image, c.name AS category_name FROM products p JOIN categories c ON p.category_id = c.category_id ORDER BY $order_sql LIMIT $product_per_page OFFSET $offset";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/product_service.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Chocoley - Product/Service</title>
</head>
<body>
    <?php
        include "./Components/header.php";
    ?>

    <h1 id="product-title">Product</h1>

    <?php
        include "./Components/search.php";
    ?>

    <section id="product-container">
        <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product">
                                <div class="product-image">
                                    <img src="../Images/Products/' .$row['image']. '" alt="white-chocolate">
                                </div>
                                <h1 class="product-name">' .$row['name']. '</h1>
                                <p class="description">'.$row['description']. '</p>
                                <p class="category"><b>Category:</b> ' .$row['category_name'].'</p>
                                <div class="product-price">
                                    <h2 class="price">' .$row['price']. ' USD</h2>
                                    <a href="index.php?user=product_detail">View</a>
                                </div>
                            </div>';
                }
            }
        ?>
    </section>

    <section id="pagination">
        <?php if ($page > 1): ?>
            <a href="index.php?user=product_service&page_number=<?php echo $page - 1 ?>&order_name=<?php echo $order_name ?>&order=<?php echo $order ?>"><img src="../Images/Product_service/left_arrow.png" alt="left-arrow"></a>
        <?php else: ?>
            <a href="index.php?user=product_service&page_number=<?php echo $page ?>&order_name=<?php echo $order_name ?>&order=<?php echo $order ?>"><img src="../Images/Product_service/left_arrow.png" alt="left-arrow"></a>
        <?php endif; ?>

        <div class="pagination-list">
            <?php
                $total_query = 'SELECT COUNT(id) AS num_rows FROM products';
                $total_query_result = mysqli_query($conn, $total_query);
                $total_row = mysqli_fetch_assoc($total_query_result);
                $total_row = $total_row['num_rows'];
                $total_page = ceil($total_row / $product_per_page);
                if ($total_page > 6) {
                    for ($x = $page; $x <= $page + 3; $x++) {
                        echo '<a class="pagination-number" href="index.php?user=product_service&page_number=' .$x. '&order_name='.$order_name.'&order='.$order.'">'.$x.'</a>';
                    }
                    echo '<p class="dots">...</p>';
                    for ($y = $total_page - 3; $y <= $total_page; $y++) {
                        echo '<a class="pagination-number" href="index.php?user=product_service&page_number=' .$y. '&order_name='.$order_name.'&order='.$order.'">'.$y.'</a>';
                    }
                }

                for ($i = 1; $i <= $total_page; $i++) {
                    echo '<a class="pagination-number" href="index.php?user=product_service&page_number=' .$i. '&order_name='.$order_name.'&order='.$order.'">'.$i.'</a>';
                }
            ?>
        </div>
        <?php if ($page < $total_page): ?>
            <a href="index.php?user=product_service&page_number=<?php echo $page + 1 ?>&order_name=<?php echo $order_name ?>&order=<?php echo $order ?>"><img src="../Images/Product_service/right_arrow.png" alt="right-arrow"></a>
        <?php else: ?>
            <a href="index.php?user=product_service&page_number=<?php echo $page?>&order_name=<?php echo $order_name ?>&order=<?php echo $order ?>"><img src="../Images/Product_service/right_arrow.png" alt="right-arrow"></a>
        <?php endif; ?>
    </section>

    <?php
        include "./Components/info.php";
        include "./Components/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.min.js" integrity="sha384-Re460s1NeyAhufAM5JwfIGWosokaQ7CH15ti6W5Y4wC/m4eJ5opJ2ivohxVM05Wd" crossorigin="anonymous"></script>

    <script type="text/javaScript">
        document.addEventListener("DOMContentLoaded", function() {
            const name = document.getElementById("name-sort");
            const price = document.getElementById("price-sort");
            let page_number = '<?php echo $page ?>';

            name.addEventListener("click", function() {
                let clickcount = 0;
                if (window.location.search.includes("order_name=name&order=DESC")) {
                    clickcount = 1;
                }
                if (clickcount % 2 != 0) {
                    window.location.href = `index.php?user=product_service&page_number=${page_number}&order_name=name&order=ASC`;
                    clickcount++;
                } else {
                    window.location.href = `index.php?user=product_service&page_number=${page_number}&order_name=name&order=DESC`;
                    clickcount++;
                }
            });

            price.addEventListener("click", function() {
                let clickcount = 0;
                if (window.location.search.includes("order_name=price&order=DESC")) {
                    clickcount = 1;
                }
                if (clickcount % 2 != 0) {
                    window.location.href = `index.php?user=product_service&page_number=${page_number}&order_name=price&order=ASC`;
                    clickcount++;
                } else {
                    window.location.href = `index.php?user=product_service&page_number=${page_number}&order_name=price&order=DESC`;
                    clickcount++;
                }
            })
        });
    </script>
</body>
</html>

<?php
    mysqli_close($conn);
?>