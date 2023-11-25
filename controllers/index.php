<?php

$config = require('core/config.php');
$db = new Database($config['database']);

$features = $db->query("SELECT * FROM products LIMIT 4")->get();
$iphones = $db->query("SELECT * FROM products WHERE category_id='9' LIMIT 4")->get();
$samsungs   = $db->query("SELECT * FROM products WHERE category_id='10' LIMIT 4")->get();
$computers   = $db->query("SELECT * FROM products WHERE category_id='11' LIMIT 4")->get();

require "views/index.view.php";
