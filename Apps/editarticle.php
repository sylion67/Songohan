<?php
$id=$_GET['id'];
$manager = new ArticleManager($pdo);
$article=$manager->findById($id);
if (isset($_GET['id']))
{

		require('Views/editarticle.phtml');
}
else
{

	$error = "/!\  Vous devez préciser l'article à modifier /!\ ";
	require('apps/error.php');
}