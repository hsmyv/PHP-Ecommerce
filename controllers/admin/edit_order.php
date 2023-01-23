<?php
session_start();
$config = require('core/config.php');
$db = new Database($config['database']);

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $order = $db->query('SELECT * FROM orders WHERE order_id= :id', [
        'id' => $order_id
    ])->findOrFail();
}else if(isset($_POST['edit_order'])){
    $order_status = $_POST['order_status'];
    $order_id     = $_POST['order_id'];

    $update = $db->query(
        "UPDATE orders SET 
        order_status = :ostatus
        WHERE order_id= :id",
        [
            'id'            => $order_id,
            'ostatus'       => $order_status
        ]
    );
    if ($update) {
        header("location: index?order_updated=Order has been updated successfully");
    } else {
        header("location: index?order_failed=Error occurred, try again");
    }
} else if (isset($_POST['cancel'])) {
    header("location: index");
}else {
    header('index');
    exit;
}



require "views/admin/edit-order.view.php";