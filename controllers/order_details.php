<?php

$config = require('core/config.php');
$db = new Database($config['database']);


if (isset($_POST['order_details_btn']) && isset($_POST['order_id'])) {

    $order_id     =  $_POST['order_id'];
    $order_status =  $_POST['order_status'];
    $order_detail =  $db->query("SELECT * FROM order_items WHERE order_id= :id", [
        'id' => $order_id
    ])->find();
    $order_total_price = calcTotalOrderPrice($order_detail);
} else {
    header('location: account');
    exit;
}


function calcTotalOrderPrice($order_detail)
{
    $total = 0;
    // while($order_detail)
    
        $product_price = $order_detail['product_price'];
        $product_quantity = $order_detail['product_quantity'];
        $total = $total + ($product_price * $product_quantity);
    
    return $total;
}




require "views/order_details.view.php";
