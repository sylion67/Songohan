<?php

$manager = new OrderManager($pdo);
$orders = $manager->findAll();
require('Views/orders.phtml');


?>


