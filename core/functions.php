<?php

function DB()
{
    $config = require('core/config.php');
    $db = new Database($config['database']);
    return $db;
}
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

function getCategoryById($id)
{
    $category = DB()->query("SELECT * FROM categories WHERE id=:id", [
        'id' => $id
    ])->findOrFail();


    return $category;
}
