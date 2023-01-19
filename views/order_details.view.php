<?php require("partials/header.php") ?>


<!--Navigation bar-->
<?php require("partials/nav.php") ?>


<!--Order Details-->
<section id="orders" class="orders container my-5 py-3">
    <div class="container mt-5">
        <h2 class="font-weight-bold text-center">Order details</h2>
        <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>



        <tr>
            <td>
                <div class="product-info">
                    <img src="public/imgs/<?= $order_detail['product_image'] ?>" alt="">
                    <div>
                        <p class="mt-3"> <?= $order_detail['product_name'] ?></p>
                    </div>
                </div>

            </td>

            <td>
                <span>$<?= $order_detail['product_price'] ?></span>
            </td>
            <td>
                <span><?= $order_detail['product_quantity'] ?></span>
            </td>


        </tr>

    </table>

    <?php if ($order_status == "not paid") { ?>
        <form style="float: right;" method="POST" action="payment">
            <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
            <input type="hidden" name="order_total_price" value="<?php echo $order_total_price;?>">
            <input type="hidden" name="order_status" value="<?php echo $order_status;?>">
            <input type="submit" name="order_pay_btn" class="btn btn-primary" value="Pay Now">
        </form>
    <?php } ?>

</section>
















<!--Footer-->
<?php require("partials/footer.php") ?>