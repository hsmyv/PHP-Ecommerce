<?php
session_start();
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

    $update = $db->query(
        "UPDATE products SET 
        product_name=:pname, 
        product_description=:pdescription, 
        product_price=:price,
        product_color=:color,
        product_special_offer=:offer,
        product_category=:category
         
        WHERE product_id= :id",
        [
            'id'            => $product_id,
            'pname'          => $name,    
            'pdescription'   => $description,
            'price'         => $price,
            'color'         => $color,
            'offer'         => $offer,
            'category'      => $category,
        ]
    );
   
    if($update){
        header("location: products?edit_success_message=Product has been updated successfully");

    }else{
        header("location: products?edit_failure_message=Error occurred, try again");

    }
}else if(isset($_POST['cancel'])){
    header("location: products");
}



else{
    header('products');
    exit; 
}



require "views/admin/edit-product.view.php";