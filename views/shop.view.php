<?php require("partials/header.php") ?>

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
                <p>Search Products</p>
                <hr>
            </div>
            <form action="shop" method="POST">
                <div class="row mx-auto container">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p>Category</p>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="9" name="category" id="category_one" <?php if(isset($category) && $category==9){echo 'checked';}?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Iphone
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="10" name="category" id="category_two" <?php if(isset($category) && $category==10){echo 'checked';}?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Samsung
                            </label>
                        </div>
                        <!-- <div class="form-check">
                            <input type="radio" class="form-check-input" value="watches" name="category" id="category_two" <?php if(isset($category) && $category=='watches'){echo 'checked';}?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Watches
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="bags" name="category" id="category_one" <?php if(isset($category) && $category=='bags'){echo 'checked';}?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Bags
                            </label>
                        </div> -->
                    </div>
                </div>
                <div class="row mx-auto container mt-5">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p>Price</p>
                        <input type="range" class="form-range w-50" name="price" value="<?php if (isset($price)) {
                                                                                            echo $price;
                                                                                        } else {
                                                                                            echo "100";
                                                                                        } ?>" min="1" max="1000" id="customRange2">
                        <div class="w-50">
                            <span style="float: left;">1</span>
                            <span style="float: right;">1000</span>
                        </div>
                    </div>
                </div>

                <div class="form-group my-3 mx-3">
                    <input type="submit" name="search" value="Search" class="btn btn-primary">
                </div>
            </form>
        </section>

        <!--SHOP-->
        <section id="shop" class="my-5 py-5">
            <div class="container mt-5 py-5" style="display: flex; flex-direction: column;">
                <h3>Our Products</h3>
                <hr>
                <p>Here you can check out our products</p>
            </div>
            <div class="row mx-auto container">
                <?php foreach ($products as $product) : ?>
                    <div class="product text-center col-lg-3 col-md-4 cold-sm-12">
                        <img class="img-fluid mb-3" src="public/imgs/<?= $product['product_image'] ?>" alt="">
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 class="p-name"><?= $product['product_name'] ?></h5>
                        <h4 class="p-price"><?= $product['product_price'] ?></h4>
                        <a href="product?id=<?= $product['product_id'] ?>"><button class="shop-buy-btn">Buy Now</button></a>
                    </div>
                <?php endforeach; ?>

                <nav aria-label="Page navigation example" class="mx-auto">
                    <ul class="pagination mt-5 mx-auto">
                        <li class="page-item <?php if ($page_no <= 1) {echo 'disabled';} ?>">
                            <a class="page-link" href="<?php if ($page_no <= 1) {echo '#';} else {echo "?page_no=" . ($page_no - 1);} ?>">Previous</a>
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
                                                        } ?>">Next</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </section>
    </div>




    <!--Footer-->
    <?php require("partials/footer.php") ?>