<?php

session_start();

$config = require('core/config.php');
$db = new Database($config['database']);


//if user is not logged in
if (!isset($_SESSION['logged_in'])) {
    header('location: ../cart?message=Please login/register to place an order');
    exit;

    ///if user logged in
} else {
    if (isset($_POST['place_order'])) {
        // 1. get user info and store it in database

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $order_cost = $_SESSION['total'];
        $order_status = "not_paid";
        $user_id = $_SESSION['user_id'];
        $order_date = date('Y-m-d H:i:s');

        $stmt_status = $db->query("INSERT INTO orders(order_cost,order_status,user_id,user_phone,user_city,user_address,order_date)
            VALUES(:order_cost,:order_status,:user_id,:user_phone,:user_city,:user_address,:order_date)", [
            'order_cost' => $order_cost,
            'order_status' => $order_status,
            'user_id'      => $user_id,
            'user_phone'   => $phone,
            'user_city'     => $city,
            'user_address'  => $address,
            'order_date'    => $order_date
        ]);

        if (!$stmt_status) {
            header('location: index');
            exit;
        }
        // 2. issue new order and store order info in database
        $order_id =  $db->connection->lastInsertId();


        // 3. get products from cart (from session)
       
        foreach ($_SESSION['cart'] as $key => $value) {
            $product = $_SESSION['cart'][$key];
            $product_id = $product['product_id'];
            $product_name = $product['product_name'];
            $product_image = $product['product_image'];
            $product_price = $product['product_price'];
            $product_quantity = $product['product_quantity'];

            //4. store each single item in order_items database
            $order_item = $db->query("INSERT INTO order_items(order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date)
            VALUES(:order_id,:product_id,:product_name,:product_image,:product_price,:product_quantity,:user_id,:order_date)", [
                'order_id'      => $order_id,
                'product_id'    => $product_id,
                'product_name'  => $product_name,
                'product_image' => $product_image,
                'product_price' => $product_price,
                'product_quantity' => $product_quantity,
                'user_id'       => $user_id,
                'order_date'    => $order_date
            ]);

            
        }

        // 5. remove everything from cart ----> delay until payment is done
        //unset($_SESSION['cart']);


        $_SESSION['order_id'] = $order_id;
        // 6. infor user where everything is fine o there is a problem
        header('location: ../payment?order_status=order placed successfully');

    }
}
if (!empty($_SESSION['cart'])) {
} else {
    header('location: cart');
}




require "views/checkout.view.php";
