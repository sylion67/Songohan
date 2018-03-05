<?php

$manager = new OrderManager($pdo);
$orders = $manager->findAll();
var_dump($orders);
/*$sql = "SELECT * FROM orders";
$query = $pdo->prepare($sql);
$query->execute();

$orders = $query->fetchAll();*/

require('Views/orders.phtml');


?>


