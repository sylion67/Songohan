<?php
	$id = $_GET['id'];
	$manager = new ArticleManager($pdo);
	$article = $manager->findById($id);
	if ($article)
	{
		require('Views/article.phtml');
	}
	else
	{
		$error = "/!\  L'article ".$id." n'existe pas /!\ ";
		require('Apps/error.php');
	}