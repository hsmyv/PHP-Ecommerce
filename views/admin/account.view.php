<?php require("partials/header.php") ?>

<!--Login-->
<div class="container-fluid">
    <div class="row" style="min-height: 1000px">
        <?php include("partials/sidebar.php"); ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group my-2">
                    </div>
                </div>
            </div>
            <section class="my-2 py-2">
                <div class="row container mx-auto">
                    <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                        <h3 class="font-weight-bold">Account info</h3>
                        <hr class="mx-auto">
                        <div class="account-info">
                            <p>Name <span><?php if (isset($_SESSION['admin_name'])) {
                                                echo $_SESSION['admin_name'];
                                            } ?></span></p>
                            <p>Email <span><?php if (isset($_SESSION['admin_email'])) {
                                                echo $_SESSION['admin_email'];
                                            } ?></span></p>
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
    </div>
</div>