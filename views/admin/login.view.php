<?php require("partials/header.php") ?>



<!--Login-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Login</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="login-form" action="login" method="POST">
            <p style="color:red" class="text-center"><?php if (isset($_GET['error'])) {
                                                            echo $_GET['error'];
                                                        } ?></p>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" id="login-email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" id="login-password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login">
            </div>
           
        </form>

    </div>

</section>


