<?php
$id = $_GET['id'];
	$article = $manager->find($id);
	//$sql = "SELECT * FROM `articles` WHERE id=".$id;
	//$res = mysqli_query($db, $sql);
	if ($article)
	{
		require('views/article.phtml');
	}
	else
	{
		$error = "/!\  L'article ".$id." n'existe pas /!\ ";
		require('apps/error.php');
	}