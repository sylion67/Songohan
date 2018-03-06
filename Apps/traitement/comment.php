<?php
if (isset($_POST['action']))
{
	$manager = new CommentManager($pdo);
	$action = $_POST['action'];
	if ($action == 'comment.create')
	{
		if (isset($_POST['title'], $_POST['content']))
		{
			$title = $_POST['title'];
			$content = $_POST['content'];
			

			$comment = $manager->create($title, $content);
			// $sql = "INSERT INTO comments (title, content, picture, author) VALUES('".$title."', '".$content."', '".$picture."', '".$author."')";
			// mysqli_query($db, $sql);
			header('Location: index.php?page=home');
			exit;
		}
	}
	else if ($action == 'comment.edit')
	{
		if (isset($_POST['title'], $_POST['content'], $_POST['picture'] ))
		{
			$title = $_POST['title'];
			$content = $_POST['content'];
			$uploaddir = 'Public/img/menu/';
			$picture = $uploaddir.($_POST['picture']);
			$id = $_POST['id'];
			$comment = $manager->find($id);
			$comment->setTitle($title);
			$comment->setContent($content);
			$comment->setPicture($picture);
			$manager->save($comment);
			//$sql = "UPDATE comments SET title='".$title."', content='".$content."', picture='".$picture."', author='".$author."' WHERE id=".$id;
			//mysqli_query($db, $sql);
			header('Location: index.php?page=commentadmin&id='.$id);
			exit;
		}
	}
	else if ($action == 'comment.delete')
	{
		if (isset($_POST['id']))
		{
			$id = $_POST['id'];
			$comment = $manager->find($id);
			$manager->remove($comment);
			//$sql = "DELETE FROM comments WHERE id=".$id;
			//mysqli_query($db, $sql);
			header('Location: index.php?page=listecomment');
			exit;
		}
	}
}

?>