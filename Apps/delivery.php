<?php
$manager_order = new OrderManager($pdo);



$manager_product = new ProductsManager($pdo);
$products = $manager_product->findAll();
require('Views/delivery.phtml');