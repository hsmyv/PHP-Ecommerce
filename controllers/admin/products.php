<?php
session_start();
authAdmin();

$config = require('core/config.php');
$db = new Database($config['database']);


//1.determine page no
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    //if user has already entered page then page number is the one that they selected
    $page_no = $_GET['page_no'];
} else {
    //if user just entered the page then default page is 1
    $page_no = 1;
}

//2. return number of products
$total_records = $db->query("SELECT count(*) as total_records FROM products")->find();

//3. products per page

$total_records_per_page = 4;
$offset = ($page_no - 1) * $total_records_per_page;
$previos_page = $page_no - 1;
$next_page    = $page_no + 1;

$adjacents = "2";
$total_no_of_pages = ceil($total_records['total_records'] / $total_records_per_page);
//4. get all products
$products = $db->query("SELECT * FROM products LIMIT $offset, $total_records_per_page")->get();



require "views/admin/products.view.php";
