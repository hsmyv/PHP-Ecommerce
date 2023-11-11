<?php
session_start();
authAdmin();

$config = require('core/config.php');
$db = new Database($config['database']);

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $product = $db->query('SELECT * FROM products WHERE product_id= :id', [
    'id' => $product_id 
])->findOrFail();

}else if(isset($_POST['edit_btn'])){

    $product_id  = $_POST['product_id'];
    $name        = $_POST['name'];
    $description = $_POST['description'];
    $price       = $_POST['price'];
    $color       = $_POST['color'];
    $offer       = $_POST['offer'];
    $category    = $_POST['category'];
    
    $picture_name = uniqid('image_', true);


    if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
        $image1 = $_FILES['image1']['tmp_name'];
        $image_name1 = $picture_name . "1.jpeg";
        move_uploaded_file($image1, "public/imgs/" . $image_name1);
    }else {
        $image_name1 = $product['product_image'];
    }


    if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
        $image2 = $_FILES['image2']['tmp_name'];
        $image_name2 = $picture_name . "2.jpeg";
        move_uploaded_file($image2, "public/imgs/" . $image_name2);
    }else {
        $image_name2 = $product['product_image2'];
    }


    if (isset($_FILES['image3']) && $_FILES['image3']['error'] === UPLOAD_ERR_OK) {
        $image3 = $_FILES['image3']['tmp_name'];
        $image_name3 = $picture_name . "3.jpeg";
        move_uploaded_file($image3, "public/imgs/" . $image_name3);
    }else {
        $image_name3 = $product['product_image3'];
    }


    if (isset($_FILES['image4']) && $_FILES['image4']['error'] === UPLOAD_ERR_OK) {
        $image4 = $_FILES['image4']['tmp_name'];
        $image_name4 = $picture_name . "4.jpeg";
        move_uploaded_file($image4, "public/imgs/" . $image_name4);
    }else {
        $image_name4 = $product['product_image4'];
    }

        $update = $db->query(
        "UPDATE products SET 
        product_name=:pname, 
        product_description=:pdescription, 
        product_price=:price,
        product_color=:color,
        product_special_offer=:offer,
        category_id=:category_id,
        product_image=:image1,
        product_image2=:image2,
        product_image3=:image3,
        product_image4=:image4
        
        WHERE product_id= :id",
        [
            'id'            => $product_id,
            'pname'         => $name,    
            'pdescription'  => $description,
            'price'         => $price,
            'color'         => $color,
            'offer'         => $offer,
            'category_id'   => $category,
            'image1'        => $image_name1,
            'image2'        => $image_name2,
            'image3'        => $image_name3,
            'image4'        => $image_name4,
        ]
    );

   
    if($update){
        header("location: products?edit_success_message=Product has been updated successfully");

    }else{
        header("location: products?edit_failure_message=Error occurred, try again");

    }
} else if (isset($_POST['cancel'])) {
    header("location: products");
}


else{
    header('products');
    exit; 
}



require "views/admin/edit-product.view.php";