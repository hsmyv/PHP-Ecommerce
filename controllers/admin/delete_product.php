<?php
session_start();
authAdmin();

$config = require('core/config.php');
$db = new Database($config['database']);



if (isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];
    $product = $db->query('SELECT * FROM products WHERE product_id= :id', [
        'id' => $product_id 
    ])->findOrFail();

    $productDatabase = $db->query("DELETE FROM products WHERE product_id=:id", [
        'id' => $product_id
    ]);

    $imagePath = 'public/imgs/' . $product['product_image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
    }
    $imagePath = 'public/imgs/' . $product['product_image2'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
    }
    $imagePath = 'public/imgs/' . $product['product_image3'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
    }
    $imagePath = 'public/imgs/' . $product['product_image4'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
    }



    if ($productDatabase) {
        header('location: products?deleted_success_message=Product has been deleted successfully');
    } else {
        header('location: products?deleted_failure_message=Could not delete product!');
    }
}
