<?php require("partials/header.php") ?>


<!--Navigation bar-->
<?php require("partials/nav.php") ?>
<!--Single product-->
<section class="container single-product my-5 pt-5">
    <div class="row mt-5">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <img class="img-fluid w-100" src="public/imgs/<?= $product['product_image'] ?>" id="mainImg">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="public/imgs/<?= $product['product_image'] ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="public/imgs/<?= $product['product_image2'] ?>" width="100%" class="small-img" alt="">
                </div>

                <div class="small-img-col">
                    <img src="public/imgs/<?= $product['product_image3'] ?>" width="100%" class="small-img" alt="">
                </div>

                <div class="small-img-col">
                    <img src="public/imgs/<?= $product['product_image4'] ?>" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
            <h6>Men/Shoes</h6>
            <h3 class="py-4"><?= $product['product_name'] ?></h3>
            <h2><?= $product['product_price'] ?></h2>
            <form method="POST" action="cart">
                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                <input type="hidden" name="product_image" value="<?= $product['product_image'] ?>">
                <input type="hidden" name="product_name" value="<?= $product['product_name'] ?>">
                <input type="hidden" name="product_price" value="<?= $product['product_price'] ?>">
                <input type="number" name="product_quantity" value="1">
                <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
            </form>
            <h4 class="mt-5 mb-5">Product details</h4>
            <span><?= $product['product_description'] ?></span>
        </div>
    </div>
</section>

<!--Related products-->
<section id="related-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Related Products</h3>
        <hr class="mx-auto">
    </div>
    <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 cold-sm-12">
            <img class="img-fluid mb-3" src="public/imgs/featured1.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">$199.99</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 cold-sm-12">
            <img class="img-fluid mb-3" src="public/imgs/featured2.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">$199.99</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 cold-sm-12">
            <img class="img-fluid mb-3" src="public/imgs/featured3.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">$199.99</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 cold-sm-12">
            <img class="img-fluid mb-3" src="public/imgs/featured4.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sports Shoes</h5>
            <h4 class="p-price">$199.99</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
    </div>
</section>




<!--Footer-->
<?php require("partials/footer.php") ?>

<script>
    var mainImg = document.getElementById("mainImg");
    var smalling = document.getElementsByClassName("small-img");

    for (let i = 0; i < 4; i++) {
        smalling[i].onclick = function() {
            mainImg.src = smalling[i].src;
        }

    }
</script>
</body>

</html>