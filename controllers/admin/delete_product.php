<?php
session_start();
$config = require('core/config.php');
$db = new Database($config['database']);


if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login');
    exit();
}


if (isset($_GET['product_id'])) {

    $product = $db->query("DELETE FROM products WHERE product_id=:id", [
        'id' => $_GET['product_id']
    ]);



    if ($product) {
        header('location: products?deleted_success_message=Product has been deleted successfully');
    } else {
        header('location: products?deleted_failure_message=Could not delete product!');
    }
}
