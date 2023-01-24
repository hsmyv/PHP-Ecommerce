<?php
session_start();
authAdmin();

$config = require('core/config.php');
$db = new Database($config['database']);


if (isset($_POST['create_product'])) {
    $name        = $_POST['name'];
    $description = $_POST['description'];
    $price       = $_POST['price'];
    $color       = $_POST['color'];
    $offer       = $_POST['offer'];
    $category    = $_POST['category'];

    $image1      = $_FILES['image1']['tmp_name'];
    $image2      = $_FILES['image2']['tmp_name'];
    $image3      = $_FILES['image3']['tmp_name'];
    $image4      = $_FILES['image4']['tmp_name'];

    $image_name1 = $name . "1.jpeg";
    $image_name2 = $name . "2.jpeg";
    $image_name3 = $name . "3.jpeg";
    $image_name4 = $name . "4.jpeg";

    move_uploaded_file($image1, "public/imgs/" . $image_name1);
    move_uploaded_file($image2, "public/imgs/" . $image_name2);
    move_uploaded_file($image3, "public/imgs/" . $image_name3);
    move_uploaded_file($image4, "public/imgs/" . $image_name4);

    $create = $db->query(
        "INSERT INTO products( 
        product_name,
        product_category,
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
        :product_category,        
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
            'product_category'      => $category,
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
