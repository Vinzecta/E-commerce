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
            window.location.href = `index.php?page=product_service&page_number=${page_number}&order_name=name&order=ASC`;
            clickcount++;
        } else {
            window.location.href = `index.php?page=product_service&page_number=${page_number}&order_name=name&order=DESC`;
            clickcount++;
        }
    });

    price.addEventListener("click", function() {
        let clickcount = 0;
        if (window.location.search.includes("order_name=price&order=DESC")) {
            clickcount = 1;
        }
        if (clickcount % 2 != 0) {
            window.location.href = `index.php?page=product_service&page_number=${page_number}&order_name=price&order=ASC`;
            clickcount++;
        } else {
            window.location.href = `index.php?page=product_service&page_number=${page_number}&order_name=price&order=DESC`;
            clickcount++;
        }
    })
});