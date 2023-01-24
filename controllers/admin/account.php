<?php
session_start();
$config = require('core/config.php');
$db = new Database($config['database']);


authAdmin();


if (isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $admin_email = $_SESSION['admin_email'];


    if ($password != $confirmPassword) {
        header("location: account?error=Passwords don't match");
    } else if (strlen($password) < 6) {
        header("location: account?error=Password must be at least 6 charachters");

        //if not errors
    } else {
        $update = $db->query(
            "UPDATE admins SET admin_password=:admin_password WHERE admin_email= :email",
            [
                'admin_password' => md5($password),
                'email'         => $admin_email,
            ]
        );

        if ($update) {
            header('location: account?message=password has been updated successfully');
        } else {
            header("location: account?error=password couldn't update password");
        }
    }
}


require "views/admin/account.view.php";
