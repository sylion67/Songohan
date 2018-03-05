<?php
$id=$_GET['id'];
$manager = new ArticleManager($pdo);
$article=$manager->findById($id);
require('Views/articleadmin.phtml');