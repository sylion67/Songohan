<?php
$manager = new OrderManager($pdo);
$order = $manager->find(1);
var_dump($order);
echo "<hr>";
$products = $order->getProducts();
var_dump($products);
echo $products[0]->getPrice();
echo "<hr>";
$customer = $order->getCustomer();
var_dump($customer);
?>
<div><?=$order->getCustomer()->getCustomerFirstName()?></div>