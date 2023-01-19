<?php

session_start();

if(isset($_POST['add_to_cart'])){
    //if user has already added a product to cart
    if(isset($_SESSION['cart'])){
        $products_array_ids = array_column($_SESSION['cart'],"product_id");
        //if product has already added to cart or not
        if(!in_array($_POST['product_id'], $products_array_ids)){

            $product_id = $_POST['product_id'];
            $product_array = array(
                'product_id'        => $_POST['product_id'],
                'product_name'      => $_POST['product_name'],
                'product_price'     => $_POST['product_price'],
                'product_image'     => $_POST['product_image'],
                'product_quantity' =>  $_POST['product_quantity']
            );


            $_SESSION['cart'][$product_id] = $product_array;

            //product has already been added
        }else{
            echo '<script>alert("Product was already to cart");</script>';
            
        }

        //if this is the firs product
    }else{
        $product_id =       $_POST['product_id'];
        $product_name =     $_POST['product_name'];
        $product_price =    $_POST['product_price'];
        $product_image =    $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
                        'product_id' => $product_id,
                        'product_name' =>$product_name,
                        'product_price' => $product_price,
                        'product_image' => $product_image,
                        'product_quantity' => $product_quantity
        );


        $_SESSION['cart'][$product_id] = $product_array;
    }
    
    // calculate total
    calcTotalCart();

    //remove
}else if(isset($_POST['remove_product'])){

    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
    // calculate total
    calcTotalCart();

}else if(isset($_POST['edit_quantity'])){
    //we get id and quantity from the form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    //get the product array from session
    $product_array = $_SESSION['cart'][$product_id];

    //update product quantity
    $product_array['product_quantity'] = $product_quantity;

    //return array back its place
    $_SESSION['cart'][$product_id] = $product_array;

    
    // calculate total
    calcTotalCart();


}else{
    // header('location: index');
}

function calcTotalCart(){
    $total_price = 0;
    $total_quantity = 0;

    foreach ($_SESSION['cart'] as $key => $value){
        $product = $_SESSION['cart'][$key];

        $price = $product['product_price'];
        $quantity = $product['product_quantity'];

        $total_price = $total_price + ($price * $quantity);
        $total_quantity = $total_quantity + $quantity;

    }

    $_SESSION['total'] = $total_price;
    $_SESSION['quantity'] = $total_quantity;
}


require "views/cart.view.php";

?>