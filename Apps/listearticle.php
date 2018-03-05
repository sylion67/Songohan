<?php
$manager = new ArticleManager($pdo);
$articles = $manager->findAll();
require('Views/listearticle.phtml');