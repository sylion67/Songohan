<?php 
$id = $_GET['id'];
$manager = new ReservationsManager;
$reservation = $manager->find($id);
require('Views/resumeresa.phtml');
 ?>