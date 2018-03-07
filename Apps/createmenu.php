<?php
$manager = new ProductsManager($pdo);
$products = $manager->findAll();

if (isset($_GET['id']))
{
    $products = $manager->find($_GET['id']);
    require('Views/createmenu.phtml'); 
}
else
{
    require('Views/editmenu.phtml');
}
?>