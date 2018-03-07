<?php

$manager = new OrderManager($pdo);
$orders = $manager->findAll();
/*$sql = "SELECT * FROM orders";
$query = $pdo->prepare($sql);
$query->execute();

$orders = $query->fetchAll();*/
var_dump($orders);
require('Views/orders.phtml');


?>


