<?php

$manager = new ProductsManager($pdo);
$products = $manager->findAll();
require('Views/editmenu.phtml');


?>