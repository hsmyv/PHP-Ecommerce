<?php require("partials/header.php") ?>



<!--Register-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Register</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
    <form id="register-form" action="register" method="POST">
            <p style="color:red"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" id="register-name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" id="register-email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" id="register-password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword" id="register-confirm-password" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" id="register-btn" name="register" value="Register">
            </div>
            <div class="form-group">
                <a href="login" id="login-url" class="btn">Do you have account? Login</a>
            </div>
        </form>

    </div>

</section>


