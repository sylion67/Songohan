<?php
if (isset($_POST['action']))
{
	$manager = new ArticleManager($pdo);
	$action = $_POST['action'];
	if ($action == 'create')
	{
		if (isset($_POST['title'], $_POST['content'], $_POST['date'],
			$_POST['picture'] ))
		{
			$title = $_POST['title'];
			$content = $_POST['content'];
			$date = $_POST['date'];
			$picture = $_POST['picture'];
			$article = $manager->create($title, $content, $date, $picture);
			// $sql = "INSERT INTO articles (title, content, picture, author) VALUES('".$title."', '".$content."', '".$picture."', '".$author."')";
			// mysqli_query($db, $sql);
			header('Location: index.php?page=article&id='.$article->getId());
			exit;
		}
	}
	else if ($action == 'edit')
	{
		if (isset($_POST['title'], $_POST['content'],$_POST['date'],
			$_POST['picture'] ))
		{
			$title = $_POST['title'];
			$content = $_POST['content'];
			$date = $_POST['date'];
			$picture = $_POST['picture'];
			$id = $_POST['id'];
			$article = $manager->find($id);
			$article->setTitle($title);
			$article->setContent($content);
			$article->setPicture($picture);
			$manager->save($article);
			//$sql = "UPDATE articles SET title='".$title."', content='".$content."', picture='".$picture."', author='".$author."' WHERE id=".$id;
			//mysqli_query($db, $sql);
			header('Location: index.php?page=article&id='.$id);
			exit;
		}
	}
	else if ($action == 'delete')
	{
		if (isset($_POST['id']))
		{
			$id = $_POST['id'];
			$article = $manager->find($id);
			$manager->remove($article);
			//$sql = "DELETE FROM articles WHERE id=".$id;
			//mysqli_query($db, $sql);
			header('Location: index.php?page=home');
			exit;
		}
	}
}

?>