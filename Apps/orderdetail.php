<?php

$id = $_GET['id'];
$manager = new OrderManager($pdo);
$order = $manager->find($id);
$manager = new ProductsManager($pdo);
$products = $manager->countByOrder($order);

require('Views/orderdetail.phtml');