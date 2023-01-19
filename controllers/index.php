<?php

$config = require('core/config.php');
$db = new Database($config['database']);

$features = $db->query("SELECT * FROM products LIMIT 4")->get();
$clothes = $db->query("SELECT * FROM products WHERE product_category='coats' LIMIT 4")->get();
$shoes   = $db->query("SELECT * FROM products WHERE product_category='shoes' LIMIT 4")->get();
$watches = $db->query("SELECT * FROM products WHERE product_category='watches' LIMIT 4")->get();

require "views/index.view.php";
