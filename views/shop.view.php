<?php 
$selectedCategory = isset($_SESSION['selectedCategory']) ? $_SESSION['selectedCategory'] : null;
require("partials/header.php") 

?>

<style>
    .product img {
        width: 70%;
        height: auto;
        box-sizing: border-box;
        object-fit: cover;
    }

    .pagination a {
        color: black
    }

    .pagination li:hover a {
        color: #fff;
        background-color: black;

    }
</style>

</head>

<body>


    <!--Navigation bar-->
    <?php require("partials/nav.php") ?>

    <div class="shopcontainer">
        <!---Search-->
        <section id="search" class="my-5 py-5 ms-2" style="display: flex; flex-direction: column; width: 20%;">
            <div class="container mt-5 py-5" style="display: flex; flex-direction: column;">
                <p><?= $translations["Search Products"]?></p>
                <hr>
            </div>
            <form action="shop" method="POST">
                <div class="row mx-auto container">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p><?= $translations["category"]?></p>
                        <?php foreach ($categories as $category) : ?>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" value="<?= $category['id'] ?>" name="category" id="category_<?= $category['id'] ?>" <?php if ($selectedCategory == $category['id']) echo 'checked'; ?>>
                                <label class="form-check-label" for="category_<?= $category['id'] ?>">
                                    <?= $category['name'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row mx-auto container mt-5">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p>Price</p>
                        <input type="range" class="form-range w-50" name="price" value="<?php if (isset($price)) {
                                                                                            echo $price;
                                                                                        } else {
                                                                                            echo "100";
                                                                                        } ?>" min="1" max="10000" id="customRange2">
                        <div class="w-50">
                            <span style="float: left;">$1</span>
                            <span id="priceDisplay" style="float: right;"><?php echo isset($price) ? $price : "$10000"; ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group my-3 mx-3">
                    <input id="searchButton" type="submit" name="search" value="Search" class="btn btn-primary">
                </div>
            </form>
        </section>

        <!--SHOP-->
        <section id="shop" class="my-5 py-5">
            <div class="container mt-5 py-5" style="display: flex; flex-direction: column;">
                <h3><?= $translations["Our Products"]?></h3>
                <hr>
                <p><?= $translations["Here you can search our products"]?></p>
            </div>
            <div class="row mx-auto container">
                <?php foreach ($products as $product) : ?>
                    <div class="product text-center col-lg-3 col-md-4 cold-sm-12">
                        <img style="width:auto; height: 50%;" class="img-fluid mb-3" src="public/imgs/<?= $product['product_image'] ?>" alt="">
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 class="p-name"><?= $product['product_name'] ?></h5>
                        <h4 class="p-price"><?= $product['product_price'] ?></h4>
                        <a href="product?id=<?= $product['product_id'] ?>"><button class="shop-buy-btn"><?= $translations["Buy Now"]?></button></a>
                    </div>
                <?php endforeach; ?>

                <nav aria-label="Page navigation example" class="mx-auto">
                    <ul class="pagination mt-5 mx-auto">
                        <li class="page-item <?php if ($page_no <= 1) {echo 'disabled';} ?>">
                            <a class="page-link" href="<?php if ($page_no <= 1) {echo '#';} else {echo "?page_no=" . ($page_no - 1);} ?>"><?= $translations["Previous"]?></a>
                        </li>
                        <li class="page-item"><a class="page-link">1</a></li>
                        <li class="page-item"><a class="page-link">2</a></li>

                        <?php if ($page_no >= 3) { ?>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="<?php echo "?page_no=" . $page_no; ?>"><?php echo $page_no; ?></a></li>
                        <?php } ?>


                        <li class="page-item <?php if ($page_no >= $total_no_of_pages) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) {
                                                            echo '#';
                                                        } else {
                                                            echo "?page_no=" . ($page_no + 1);
                                                        } ?>"><?= $translations["Next"]?></a>
                        </li>
                    </ul>
                </nav>

            </div>
        </section>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initially hide the Search button
            $('#searchButton').hide();

            $('input[name="category"]').change(function () {
                if ($('input[name="category"]:checked').length > 0) {
                    $('#searchButton').show();
                } else {
                    $('#searchButton').hide();
                }
            });
            if ($('input[name="category"]:checked').length > 0) {
                    $('#searchButton').show();
            }
        });
    </script>


    <script>
    var priceRange = document.getElementById('customRange2');
    var priceDisplay = document.getElementById('priceDisplay');

    priceRange.addEventListener('input', function () {
        priceDisplay.textContent = "$" + this.value;
    });
</script>
    <!--Footer-->
    <?php require("partials/footer.php") ?>