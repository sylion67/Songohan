<?php

$id = $_GET['id'];
$manager = new OrderManager($pdo);
$order = $manager->findByOrderNumber($id);
$products = $order->getProducts();
$qte=2;


require('Views/orderdetail.phtml');