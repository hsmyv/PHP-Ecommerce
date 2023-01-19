<?php
session_start();

$config = require('core/config.php');
$db = new Database($config['database']);


if(isset($_GET['transaction_id']) && isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $order_status = "paid";
    $transaction_id = $_GET['transaction_id'];
    $user_id = $_SESSION['user_id'];
    $payment_date = date('Y-m-d H:i:s');



    //change order_status to paid
    $update = $db->query(
        "UPDATE orders SET order_status=:order_status WHERE order_id= :order_id",
        [
            'order_status'     => $order_status,
            'order_id'         => $order_id,
        ]
    );
    //store payment info
    $stmt1 = $db->query("INSERT INTO payments(order_id,user_id,transaction_id,payment_date)
            VALUES(:order_id,:user_id,:transaction_id,:payment_date)", [
        'order_id'            => $order_id,
        'user_id'             => $user_id,
        'transaction_id'      => $transaction_id,
        'payment_date'        => $payment_date
    ]);
    //go to user account
    header("location: ../account?payment_message=paid successfully, thanks for your shopping with us");

}else{
    header("location: index");
    exit;
}







?>