<?php

return $routes = [
    '/'                => 'controllers/index.php',
    '/account'         => 'controllers/account.php',
    '/cart'            => 'controllers/cart.php',
    '/checkout'        => 'controllers/checkout.php',
    '/contact'         => 'controllers/contact.php',
    '/login'           => 'controllers/login.php',
    '/register'        => 'controllers/register.php',
    '/shop'            => 'controllers/shop.php',
    '/product'         => 'controllers/single_product.php',
    '/payment'         => 'controllers/payment.php',
    '/order_details'   => 'controllers/order_details.php',
    '/complete_payment'=> 'server/complete_payment.php',
    '/admin/dashboard' => 'controllers/admin/index.php',
    '/admin/login'     => 'controllers/admin/login.php',
    '/admin/register'  => 'controllers/admin/register.php',
    '/admin/logout'    => 'controllers/logout.php',
    '/admin/products'  => 'controllers/admin/products.php',
    '/admin/product/edit'  => 'views/admin/edit-product.view.php'

];
