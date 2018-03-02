<?php
$manager = new ProductsManager($pdo);
$products = $manager->findById("2");
var_dump($products);
require('Views/resumeorder.phtml');