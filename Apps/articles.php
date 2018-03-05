<?php
$manager = new ArticleManager($pdo);
$articles = $manager->findAll();
foreach ($articles AS $article)
	 require('Views/articles.phtml');
?>