<?php


session_start();

$config = require('core/config.php');
$db     = new Database($config['database']);

if (isset($_SESSION['logged_in'])) {
    header('location: account');
    exit;
}



if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $user = $db->query('SELECT * FROM users WHERE user_email= :email AND user_password= :pass', [
        'email' => $email,
        'pass'   => $password
    ])->find();


    if ($user) {
        $_SESSION['user_id'] = $user['user_id'];
        //$_SESSION['user_name'] =$user['user_name'];  // user's name can't get
        $_SESSION['user_email'] = $email;
        $_SESSION['logged_in'] = true;

        header('location: account?login_success=logged in successfully');

    } else {
        header('location: login?error=could not verify your account');
    }

  } 

require "views/login.view.php";
