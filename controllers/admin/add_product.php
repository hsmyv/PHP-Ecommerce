<?php
session_start();
authAdmin();

$config = require('core/config.php');
$db = new Database($config['database']);

$categories = $db->query("SELECT * FROM categories")->get();

if (isset($_POST['create_product'])) {
    $name        = $_POST['name'];
    $description = $_POST['description'];
    $price       = $_POST['price'];
    $color       = $_POST['color'];
    $offer       = $_POST['offer'];
    $category    = $_POST['category'];


    if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
        $picture_name = uniqid('image_', true);
        $image1 = $_FILES['image1']['tmp_name'];
        $image_name1 = $picture_name . "1.jpeg";
        move_uploaded_file($image1, "public/imgs/" . $image_name1);
    }else {
        $image_name1 = $product['product_image'];
    }


    if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
        $picture_name = uniqid('image_', true);
        $image2 = $_FILES['image2']['tmp_name'];
        $image_name2 = $picture_name . "2.jpeg";
        move_uploaded_file($image2, "public/imgs/" . $image_name2);
    }else {
        $image_name2 = $product['product_image2'];
    }


    if (isset($_FILES['image3']) && $_FILES['image3']['error'] === UPLOAD_ERR_OK) {
        $picture_name = uniqid('image_', true);
        $image3 = $_FILES['image3']['tmp_name'];
        $image_name3 = $picture_name . "3.jpeg";
        move_uploaded_file($image3, "public/imgs/" . $image_name3);
    }else {
        $image_name3 = $product['product_image3'];
    }


    if (isset($_FILES['image4']) && $_FILES['image4']['error'] === UPLOAD_ERR_OK) {
        $picture_name = uniqid('image_', true);
        $image4 = $_FILES['image4']['tmp_name'];
        $image_name4 = $picture_name . "4.jpeg";
        move_uploaded_file($image4, "public/imgs/" . $image_name4);
    }else {
        $image_name4 = $product['product_image4'];
    }

    $create = $db->query(
        "INSERT INTO products( 
        product_name,
        category_id,
        product_description,
        product_image,
        product_image2,
        product_image3,
        product_image4,
        product_price,
        product_special_offer,
        product_color
        )
        Values(
        :product_name,
        :category_id,        
        :product_description, 
        :product_image,
        :product_image2,
        :product_image3,
        :product_image4,
        :product_price,
        :product_special_offer,
        :product_color
        )",
        [
            'product_name'          => $name,
            'category_id'           => $category,
            'product_description'   => $description,
            'product_image'         => $image_name1,
            'product_image2'        => $image_name2,
            'product_image3'        => $image_name3,
            'product_image4'        => $image_name4,
            'product_price'         => $price,
            'product_special_offer' => $offer,
            'product_color'         => $color
        ]
    );
    if ($create) {
        header("location: products?create_success_message=Product has been created successfully");
    } else {
        header("location: products?create_failure_message=Error occurred, try again");
    }
} else if (isset($_POST['cancel'])) {
    header("location: products");
}

require "views/admin/add-product.view.php";
