<?php require("partials/header.php") ?>


<!--Navigation bar-->
<?php require("partials/nav.php") ?>


<!--Account-->
<section class="my-5 py-5">
    <div class="row container mx-auto">
        <?php if(isset($_GET['payment_message'])){?>
            <p class="mt-5 text-center" style="color:green"><?php echo $_GET['payment_message'];?></p>
            <?php } ?>
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
            <p class="text-center" style="color:green"><?php if (isset($_GET['register_success'])) {echo $_GET['register_success'];} ?></p>
            <p class="text-center" style="color:green"><?php if (isset($_GET['login_success'])) { echo $_GET['login_success'];} ?></p>
            <h3 class="font-weight-bold">Account info</h3>
            <hr class="mx-auto">
            <div class="account-info">
                <p>Name <span><?php if (isset($_SESSION['user_name'])) {echo $_SESSION['user_name'];} ?></span></p>
                <p>Email <span><?php if (isset($_SESSION['user_email'])) {echo $_SESSION['user_email'];} ?></span></p>
                <p><a href="#orders" id="orders-btn">Your orders</a></p>
                <p><a href="account?logout=1" id="logout-btn">Logout</a></p>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <form id="account-form" method="POST" action="account">
                <p class="text-center" style="color:red"><?php if (isset($_GET['error'])) {
                                                                echo $_GET['error'];
                                                            } ?></p>
                <p class="text-center" style="color:green"><?php if (isset($_GET['message'])) {
                                                                echo $_GET['message'];
                                                            } ?></p>

                <h3>Change Password</h3>
                <hr class="mx-auto">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="">Cofirm Password</label>
                    <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Confirm Passowrd" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="change_password" value="Change Password" id="change-password-btn" class="btn">
                </div>
            </form>
        </div>
    </div>
</section>

<!--Orders-->
<section id="orders" class="orders container my-5 py-3">
    <div class="container mt-2">
        <h2 class="font-weight-bold text-center">Your Orders</h2>
        <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Order id</th>
            <th>Order cost</th>
            <th>Order status</th>
            <th>Order Date</th>
            <th>Order Details</th>
        </tr>


        <?php foreach ($orders as $order) : ?>
            <tr>
                <td>
                    <!-- <div class="product-info">
                         <img src="public/imgs/featured1.jpg" alt=""> 
                        <div>
                            <p class="mt-3"><?= $order['order_id'] ?></p>
                        </div>
                    </div> -->
                    <p class="mt-3"><?= $order['order_id'] ?></p>
                </td>

                <td>
                    <span><?= $order['order_cost'] ?></span>
                </td>
                <td>
                    <span><?= $order['order_status'] ?></span>
                </td>
                <td>
                    <span><?= $order['order_date'] ?></span>
                </td>
                <td>
                    <form method="POST" action="order_details">
                        <input type="hidden" value="<?= $order['order_status'] ?>" name="order_status">
                        <input type="hidden" name="order_id" value="<?= $order["order_id"] ?>">
                        <input class="btn" name="order_details_btn" id="order-details-btn" type="submit" value="details">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>



</section>


<!--Footer-->
<?php require("partials/footer.php") ?>