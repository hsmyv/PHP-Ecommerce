<?php
session_start();
authAdmin();

$config = require('core/config.php');
$db = new Database($config['database']);



if (isset($_GET['order_id'])) {

    $product = $db->query("DELETE FROM orders WHERE order_id=:id", [
        'id' => $_GET['order_id']
    ]);



    if ($product) {
        header('location: index?success=Product has been deleted successfully');
    } else {
        header('location: index?error=Could not delete product!');
    }
}
