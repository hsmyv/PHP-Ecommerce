<?php

return $routes = [
    '/'                      => 'controllers/index.php',
    '/account'               => 'controllers/account.php',
    '/cart'                  => 'controllers/cart.php',
    '/checkout'              => 'controllers/checkout.php',
    '/contact'               => 'controllers/contact.php',
    '/login'                 => 'controllers/login.php',
    '/register'              => 'controllers/register.php',
    '/shop'                  => 'controllers/shop.php',
    '/product'               => 'controllers/single_product.php',
    '/payment'               => 'controllers/payment.php',
    '/order_details'         => 'controllers/order_details.php',
    '/complete_payment'      => 'server/complete_payment.php',
    '/language'              => 'controllers/set_language.php',
    '/admin/index'           => 'controllers/admin/index.php',
    '/admin/login'           => 'controllers/admin/login.php',
    '/admin/register'        => 'controllers/admin/register.php',
    '/admin/logout'          => 'controllers/logout.php',
    '/admin/products'        => 'controllers/admin/products.php',
    '/admin/edit-product'    => 'controllers/admin/edit_product.php',
    '/admin/delete-product'  => 'controllers/admin/delete_product.php',
    '/admin/edit-order'      => 'controllers/admin/edit_order.php',
    '/admin/delete-order'    => 'controllers/admin/delete_order.php',
    '/admin/create-product'  => 'controllers/admin/add_product.php',
    '/admin/categories'      => 'controllers/admin/categories.php',
    '/admin/create-category' => 'controllers/admin/add_category.php',
    '/admin/edit-category'   => 'controllers/admin/edit_category.php',
    '/admin/delete-category' => 'controllers/admin/delete_category.php',
    '/admin/account'         => 'controllers/admin/account.php',
    '/admin/edit-contact'    => 'controllers/admin/edit-contact.php'

];
