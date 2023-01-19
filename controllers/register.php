<?php
session_start();
$config = require('core/config.php');
$db = new Database($config['database']);


// if user has already registered, then take user to account page
if (isset($_SESSION['logged_in'])) {
    header('location: account');
}


if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password != $confirmPassword) {
        header("location: register?error=Passwords don't match");
    } else if (strlen($password) < 6) {
        header("location: register?error=Password must be at least 6 charachters");


        //if there is no error
    } else {


        // check whether there is a user with this email or not
        $check = $db->query('SELECT * from users where user_email= :email', [
            'email' => $email,
        ])->find();
        if ($check) {
            header("location: register?error=User with this email already exists");

            //if no user registred with this email before
        } else {

            //create new user
            $stmt =  $db->query("INSERT INTO users(user_name,user_email,user_password)
            Values(:user_name,:user_email,:user_password)", [
                'user_name'     => $name,
                'user_email'    => $email,
                'user_password' => md5($password),
            ]);

            if ($stmt) {
                $user_id = $stmt->connection->lastInsertId();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('location: account?register_success=You registered successfully');
            } else {
                header("location: register?error=could not create an account at the momment");
            }
        }
    }
}












require "views/register.view.php";
