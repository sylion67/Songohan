<?php
$manager = new ProductsManager($pdo);
$products = $manager->findAll();
if (isset($_GET['id']))
{
    $product = $manager->find($_GET['id']);
    require('Views/editmenu.phtml');
}
else
{
    require('Views/createmenu.phtml');
}
require('Views/listmenu.phtml');
?>


<!--
http://localhost/Songohan/index.php?page=editmenu&id=1

$manager = new ProductsManager($pdo);
$products = $manager->findAll();
require('Views/editmenu.phtml');
-->
