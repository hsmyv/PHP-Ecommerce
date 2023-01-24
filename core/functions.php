<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] ==$value;
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if($condition)
    {
        abort($status);
    }
}

function authAdmin()
{
    if (!isset($_SESSION['admin_logged_in'])) {
        header('location: login');
        exit();
    }
}

function check_image_exists($image)
{
    if(empty($image)) return $image = "default.png";
}