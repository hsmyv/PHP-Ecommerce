<?php
session_start();


if(isset($_POST['order_pay_btn'])){
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
}

require "views/payment.view.php";