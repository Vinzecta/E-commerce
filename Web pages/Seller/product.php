<?php
    if (isset($_SESSION['email'])) {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'user') {
                header("Location: ../Web pages/index.php?user=home");
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

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT s.seller_id, s.product_id, p.name, p.description, p.price, p.image, c.name AS category_name
            FROM seller s JOIN products p ON s.product_id = p.id JOIN categories c ON p.category_id = c.category_id 
            WHERE s.seller_id = $user_id ORDER BY p.$order_sql LIMIT $product_per_page OFFSET $offset";
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
    <title>Chocoley - Your Products</title>
</head>
<body>
    <?php
        include "./Components/header.php";
    ?>

    <h1 id="product-title">Your Product</h1>

    <?php
        include "./Components/search.php";
    ?>

    <!-- <section id="sort">
        <p id="sort-by">Sort by:</p>
        <p>Name</p>
        <img id="name-sort" src="../Images/Product_service/sort.png" alt="Alphabet sort">
        <p>Price</p>
        <img id="price-sort" src="../Images/Product_service/arrow.png" alt="Price sort">
    </section> -->

    <section id="product-container">
        <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product">
                            <div class="product-image">
                                <img id="user-image" src="../Images/Products/' . $row['image'] . '" alt="Chocolate">
                            </div>
                            <h1 class="product-name">' . $row['name'] . '</h1>
                            <p class="description">' . $row['description'] . '</p>
                            <p class="category"><b>Category:</b> ' . $row['category_name'] . '</p>
                            <div class="product-price">
                                <h2 class="price">' . $row['price'] . ' USD</h2>
                                <a href="index.php?seller=edit_product&product_id=' . $row['product_id'] . '">Edit</a>
                            </div>
                        </div>';
                }
            }
        ?>
    </section>

    <section id="pagination">
        <?php if ($page > 1): ?>
            <a href="index.php?seller=product&page_number=<?php echo $page - 1 ?>&order_name=<?php echo $order_name ?>&order=<?php echo $order ?>"><img src="../Images/Product_service/left_arrow.png" alt="left-arrow"></a>
        <?php else: ?>
            <a href="index.php?seller=product&page_number=<?php echo $page ?>&order_name=<?php echo $order_name ?>&order=<?php echo $order ?>"><img src="../Images/Product_service/left_arrow.png" alt="left-arrow"></a>
        <?php endif; ?>

        <div class="pagination-list">
            <?php
                $total_query = "SELECT COUNT(seller_id) AS num_rows FROM seller WHERE seller_id = $user_id";
                $total_query_result = mysqli_query($conn, $total_query);
                $total_row = mysqli_fetch_assoc($total_query_result);
                $total_row = $total_row['num_rows'];
                $total_page = ceil($total_row / $product_per_page);

                $range = 2; 

                if ($total_page >= 1) {
                    if ($page > 1) {
                        echo '<a class="pagination-number" href="index.php?user=product_service&page_number=1&order_name='.$order_name.'&order='.$order.'">1</a>';
                    }
                    if ($page - $range > 2) {
                        echo '<p class="dots">...</p>';
                    }

                    for ($i = max(2, $page - $range); $i <= min($total_page - 1, $page + $range); $i++) {
                        if ($i == $page) {
                            echo '<span class="pagination-number active">'.$i.'</span>';
                        } else {
                            echo '<a class="pagination-number" href="index.php?user=product_service&page_number='.$i.'&order_name='.$order_name.'&order='.$order.'">'.$i.'</a>';
                        }
                    }

                    if ($page + $range < $total_page - 1) {
                        echo '<p class="dots">...</p>';
                    }

                    if ($page <= $total_page) {
                        echo '<a class="pagination-number" href="index.php?user=product_service&page_number='.$total_page.'&order_name='.$order_name.'&order='.$order.'">'.$total_page.'</a>';
                    }
                }
            ?>
        </div>
        <?php if ($page < $total_page): ?>
            <a href="index.php?seller=product&page_number=<?php echo $page + 1 ?>&order_name=<?php echo $order_name ?>&order=<?php echo $order ?>"><img src="../Images/Product_service/right_arrow.png" alt="right-arrow"></a>
        <?php else: ?>
            <a href="index.php?seller=product&page_number=<?php echo $page?>&order_name=<?php echo $order_name ?>&order=<?php echo $order ?>"><img src="../Images/Product_service/right_arrow.png" alt="right-arrow"></a>
        <?php endif; ?>
    </section>

    <?php
        include "./Components/add_section.php";
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
                    window.location.href = `index.php?seller=product&page_number=${page_number}&order_name=name&order=ASC`;
                    clickcount++;
                } else {
                    window.location.href = `index.php?seller=product&page_number=${page_number}&order_name=name&order=DESC`;
                    clickcount++;
                }
            });

            price.addEventListener("click", function() {
                let clickcount = 0;
                if (window.location.search.includes("order_name=price&order=DESC")) {
                    clickcount = 1;
                }
                if (clickcount % 2 != 0) {
                    window.location.href = `index.php?seller=product&page_number=${page_number}&order_name=price&order=ASC`;
                    clickcount++;
                } else {
                    window.location.href = `index.php?seller=product&page_number=${page_number}&order_name=price&order=DESC`;
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