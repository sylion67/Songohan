<?php

$id = $_GET['id'];
$manager = new OrderManager($pdo);
$order = $manager->findByOrderNumber($id);
$orders = $order->getProducts();
var_dump($order);
var_dump($orders);



require('Views/orderdetail.phtml');