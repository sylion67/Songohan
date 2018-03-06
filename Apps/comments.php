<?php
$manager = new CommentManager($pdo);
$comments = $manager->findAll();
require('Views/comments.phtml');