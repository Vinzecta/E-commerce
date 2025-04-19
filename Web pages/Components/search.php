<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/search.css">
</head>
<body>
    <section id="search-bar">
        <input id="search" type="text" placeholder="Search">
        <img src="../images/Search/search.png" alt="Search icon">
    </section>

    <section id="sort">
        <p id="sort-by">Sort by:</p>
        <p>Name</p>
        <img id="name-sort" src="../Images/Product_service/sort.png" alt="Alphabet sort">
        <p>Price</p>
        <img id="price-sort" src="../Images/Product_service/arrow.png" alt="Price sort">
    </section>

    <section id="searchresult" style="display: none"></section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#search").keyup(function() {
                var input = $(this).val();

                if (input.trim() != "") {
                    $.ajax({
                        url: "../Backend/search.php",
                        method: "POST",
                        data: {input: input},
                        success:function(data) {
                            $("#searchresult").css("display", "flex");
                            $("#searchresult").html(data);
                            $("#product-container").css("display", "none");
                            $("#pagination").css("display", "none");
                        }
                    })
                } else {
                    $("#searchresult").css("display", "none");
                    $("#product-container").css("display", "flex");
                    $("#pagination").css("display", "flex");
                } 
            })
        });
    </script>
</body>
</html>