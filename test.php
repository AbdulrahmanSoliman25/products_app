<?php

include('classes/Db.php');
include('classes/Product.php');

$pro = new Product();
$product = $pro->showUserProducts(2);

echo '<pre>';
var_dump($product);
echo '</pre>';
