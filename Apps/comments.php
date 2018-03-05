<?php
$manager = new CommentManager($pdo);
$comments = $manager->findAll();
foreach ($comments AS $comment)
	require('Views/comments.phtml');