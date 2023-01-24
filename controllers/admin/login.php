<?php



session_start();

$config = require('core/config.php');
$db     = new Database($config['database']);

if (isset($_SESSION['admin_logged_in'])) {
    header('location: index');
    exit;
}



if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $admin = $db->query('SELECT * FROM admins WHERE admin_email= :email AND admin_password= :pass', [
        'email' => $email,
        'pass'   => $password
    ])->find();


    if ($admin) {
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['admin_name'] =$admin['admin_name'];  // admin's name can't get
        $_SESSION['admin_email'] = $email;
        $_SESSION['admin_logged_in'] = true;

        header('location: index?Login_success=logged in successfully');

    } else {
        header('location: login?error=could not verify your account');
    }


  } 


require "views/admin/login.view.php";
