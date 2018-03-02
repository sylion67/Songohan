<?php
/*$id = $_GET['id'];*/
	$manager = new ArticleManager($pdo);
	$article = $manager->findById('1');
	var_dump($article);
	//$sql = "SELECT * FROM `articles` WHERE id=".$id;
	//$res = mysqli_query($db, $sql);
	if ($article)
	{
		require('Views/article.phtml');
	}
	else
	{
		$error = "/!\  L'article ".$id." n'existe pas /!\ ";
		require('Apps/error.php');
	}