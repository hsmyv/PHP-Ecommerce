<?php
session_start();
$config = require('core/config.php');
$db = new Database($config['database']);


if (!isset($_SESSION['logged_in'])) {
    header('location: login');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        header('location: login');
        exit;
    }
}

if (isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $user_email = $_SESSION['user_email'];


    if ($password != $confirmPassword) {
        header("location: account?error=Passwords don't match");
    } else if (strlen($password) < 6) {
        header("location: account?error=Password must be at least 6 charachters");

        //if not errors
    } else {
        $update = $db->query(
            "UPDATE users SET user_password=:user_password WHERE user_email= :email",
            [
                'user_password' => md5($password),
                'email'         => $user_email,
            ]);

        if ($update) {
            header('location: account?message=password has been updated successfully');
        } else {
            header("location: account?error=password couldn't update password");
        }
    }
}


//get orders
if(isset($_SESSION['logged_in'])){
    $orders   = $db->query("SELECT * FROM orders WHERE user_id=:user", [
    'user' => $_SESSION['user_id']
    ])->get();

}


require "views/account.view.php";
