<?php require("partials/header.php") ?>


<!--Navigation bar-->
<?php require("partials/nav.php") ?>


<!--Cart-->
<section class="cart container my-5 py-5">
    <div class="container mt-5 ">
        <h2 class="font-weight-bold">You Cart</h2>

        <hr>
    </div>

    <table class="mt pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <?php if (isset($_SESSION['cart'])) { ?>
            <?php foreach ($_SESSION['cart'] as $key => $value) { ?>

                <tr>
                    <td>
                        <div class="product-info">
                            <img src="public/imgs/<?= $value['product_image'] ?? " " ?>" alt="">
                            <div>
                                <p><?= $value['product_name'] ?></p>
                                <small><span>$</span><?= $value['product_price'] ?? " " ?></small>
                                <br>
                                <form method="POST" action="cart">
                                    <input type="hidden" name="product_id" value="<?= $value['product_id'] ?? " " ?>">
                                    <input type="submit" name="remove_product" class="remove-btn" value="remove">
                                </form>
                            </div>

                        </div>
                    </td>
                    <td>

                        <form method="POST" action="cart">
                            <input type="hidden" name="product_id" value="<?= $value['product_id'] ?? " " ?>">
                            <input type="number" name="product_quantity" value="<?= $value['product_quantity'] ?? " " ?>">
                            <input type="submit" class="edit-btn" value="edit" name="edit_quantity">
                        </form>
                    </td>
                    <td>
                        <span>$</span>
                        <span class="prodcut-price"><?= $value['product_quantity'] * $value['product_price'] ?></span>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>

    </table>

    <div class="cart-total">
        <table>
            <!-- <tr>
                <td>Subtotal</td>
                <td>$144</td>
            </tr> -->
            <tr>
                <td>Total</td>
                <?php if(isset($_SESSION['cart'])){?>
                <td>$<?php echo $_SESSION['total']; ?></td>
                <?php }?>
            </tr>
        </table>
    </div>

    <div class="checkout-container">
        <form action="checkout" method="POST">
            <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
        </form>
    </div>
    <p align="right" style="color: red;">
        <?php if (isset($_GET['message'])) {
            echo $_GET['message'];
        } ?>
        <?php if (isset($_GET['message'])) { ?>
            <a href="login" class="btn btn-primary">Login</a>
        <?php } ?>
    </p>

</section>




<!--Footer-->
<?php require("partials/footer.php") ?>