<?php
session_start();
authAdmin();

$config = require('core/config.php');
$db = new Database($config['database']);


if (isset($_POST['create_category'])) {
    $name        = $_POST['name'];
    $picture     = $_FILES['picture']['tmp_name'];


        $picture_name = uniqid('image_', true) . '.jpg';
        move_uploaded_file($picture, "public/imgs/" . $picture_name);
    


    $create = $db->query(
        "INSERT INTO categories( 
        name,
        image
        )
        Values(
        :name,
        :image
        )",
        [
            'name'          => $name,
            'image'         => $picture ? $picture_name : '',
        ]
    );
    if ($create) {
        header("location: categories?create_success_message=Product has been created successfully");
    } else {
        header("location: categories?create_failure_message=Error occurred, try again");
    }
} else if (isset($_POST['cancel'])) {
    header("location: categories");
}

require "views/admin/add-category.view.php";
