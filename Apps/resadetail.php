<?php 
$manager = new ReservationsManager($pdo);
$reservations = $manager->findAll();

/*$customer=$reservations->find();
var_dump($customer);*/
require('Views/resadetail.phtml');
?>