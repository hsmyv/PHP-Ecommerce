<?php require("partials/header.php") ?>


<!--Navigation bar-->
<?php require("partials/nav.php") ?>

<!----Home---->
<section id="home">
    <div class="container">
        <h5>New Arrivals</h5>
        <h1><span>Exclusive Phone</span> Offers</h1>
        <p>
            </h1>We offer the best products for the most affordable prices</p>
            <a href="/shop"><button class="text-uppercase">Shop Now</button></a>
    </div>
</section>

<!---Brand---->
<section id="brand" class="container">
    <div class="row">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="public/imgs/brand1.png" />
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="public/imgs/brand2.png" />
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="public/imgs/brand3.jpg" />
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="public/imgs/brand4.png" />
    </div>
</section>

<!--New-->
<section id="new" class="w-100">
    <div class="row p-0 m-0">
        <!--One-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img fluid" src="public/imgs/shop1.jpg" alt="">
            <div class="details">
                <div style="margin-left:4%">
                <h2>Phones</h2>
                <a href="/shop"><button class="text-uppercase">Shop Now</button></a>
                </div>

            </div>
        </div>
        <!--Two-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img fluid" src="public/imgs/shop2.jpg" alt="">
            <div class="details">
                <h2>Tablets</h2>
                <a href="/shop"><button class="text-uppercase">Shop Now</button></a>
            </div>
        </div>
        <!--Three-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img fluid" src="public/imgs/shop3.jpg" alt="">
            <div class="details">
                <div style="margin-right:4%">
                    <h2>Computers</h2>
                    <a href="/shop"><button class="text-uppercase">Shop Now</button></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Featured-->
<section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Our Featured</h3>
        <hr class="mx-auto">
        <p>Here you can check out our featured products</p>
    </div>
    <div class="row mx-auto container-fluid">
        <?php foreach ($features as $feature) : ?>
            <div class="product text-center col-lg-3 col-md-4 cold-sm-12">
            <img style="width: 700px; height: 500px; object-fit: cover;" class="img-fluid mb-3" src="public/imgs/<?= $feature['product_image'] ?>" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?= $feature['product_name'] ?></h5>
                <h4 class="p-price"><?= $feature['product_price'] ?></h4>
                <a href="product?id=<?= $feature['product_id'] ?>"><button class=" buy-btn">Buy Now</button></a>
            </div>
        <?php endforeach; ?>



    </div>
</section>


<!--Banner-->
<section id="banner" class="my-5 py-5">
    <div class="container">
        <h4>MID SEASON'S SALE</h4>
        <h1>Explore Fall Tech Picks <br> UP to 30% OFF</h1>
        <button class="text-uppercase">shop now</button>
    </div>
</section>


<!--Clothes-->
<section id="featured" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h3>Iphone</h3>
        <hr class="mx-auto">
        <p>Here you can check out our amazing phones</p>
    </div>
    <div class="row mx-auto container-fluid">

        <?php foreach ($iphones as $iphone) : ?>
            <div class="product text-center col-lg-3 col-md-4 cold-sm-12">
            <img style="width: 700px; height: 500px; object-fit: cover;" class="img-fluid mb-3" src="public/imgs/<?= $iphone['product_image'] ?>" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?= $iphone['product_name'] ?></h5>
                <h4 class="p-price"><?= $iphone['product_price'] ?></h4>
                <a href="product?id=<?= $iphone['product_id'] ?>"><button class="buy-btn">Buy Now</button></a>
            </div>
        <?php endforeach; ?>


    </div>
</section>

<!--Watches-->
<section id="watches" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h3>Best Samsung Phones</h3>
        <hr class="mx-auto">
        <p>Check out our amazing samsungs</p>
    </div>
    <div class="row mx-auto container-fluid">
        <?php foreach ($samsungs as $samsung) : ?>
            <div class="product text-center col-lg-3 col-md-4 cold-sm-12">
            <img style="width: 700px; height: 500px; object-fit: cover;" class="img-fluid mb-3" src="public/imgs/<?= $samsung['product_image'] ?>" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?= $samsung['product_name'] ?></h5>
                <h4 class="p-price"><?= $samsung['product_price'] ?></h4>
                <a href="product?id=<?= $samsung['product_id'] ?>"><button class="buy-btn">Buy Now</button></a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!--Shoes-->
<section id="shoes" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h3>Iphones</h3>
        <hr class="mx-auto">
        <p>Here you can check out our amazing iphones</p>
    </div>
    <div class="row mx-auto container-fluid">
        <?php foreach ($iphones as $iphone) : ?>
            <div class="product text-center col-lg-3 col-md-4 cold-sm-12">
            <img style="width: 700px; height: 500px; object-fit: cover;" class="img-fluid mb-3" src="public/imgs/<?= $iphone['product_image'] ?>" alt="">
                <div class=" star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?= $iphone['product_name'] ?></h5>
                <h4 class="p-price">$<?= $iphone['product_price'] ?></h4>
                <a href="product?id=<?= $iphone['product_id'] ?>"><button class="buy-btn">Buy Now</button></a>
            </div>
        <?php endforeach; ?>



    </div>
</section>


<!--Footer-->
<?php require("partials/footer.php") ?>