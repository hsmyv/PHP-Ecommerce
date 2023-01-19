<?php

$config = require('core/config.php');
$db = new Database($config['database']);



$product = $db->query('select * from products where product_id= :id', [
    'id' => $_GET['id'],
])->findOrFail();



require "views/single-product.view.php";
