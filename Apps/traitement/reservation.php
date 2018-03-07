<?php
if (isset($_POST['action']))
{
	$manager = new ReservationsManager($pdo);
	$action = $_POST['action'];
	if ($action == 'reservation.create')
	{
		if (isset($_POST['date'], $_POST['hour'], $_POST['nbClient']))
		{
			$reservation_date = $_POST['date'];
			$reservation_hour = $_POST['hour'];
			$client_number = $_POST['nbClient'];
			
			$reservation = $manager->create($reservation_date, $reservation_hour, $client_number);
			// $sql = "INSERT INTO articles (title, content, picture, author) VALUES('".$title."', '".$content."', '".$picture."', '".$author."')";
			// mysqli_query($db, $sql);
			var_dump($resa);
			//header('Location: index.php?page=articleadmin&id='.$reversation->getId());
			//exit;
		}
	}
	else if ($action == 'reversation.edit')
	{
		if (isset($_POST['id']))
		{

			$id = $_POST['id'];
			$reversation = $manager->find($id);
			$reversation->setTitle($title);
			$reversation->setContent($content);
			$reversation->setPicture($picture);
			$manager->save($reversation);
			//$sql = "UPDATE articles SET title='".$title."', content='".$content."', picture='".$picture."', author='".$author."' WHERE id=".$id;
			//mysqli_query($db, $sql);
			header('Location: index.php?page=articleadmin&id='.$id);
			exit;
		}
	}
	else if ($action == 'reservation.delete')
	{
		if (isset($_POST['id']))
		{
			$id = $_POST['id'];
			$reversation = $manager->find($id);
			$manager->remove($reversation);
			//$sql = "DELETE FROM articles WHERE id=".$id;
			//mysqli_query($db, $sql);
			header('Location: index.php?page=listearticle');
			exit;
		}
	}
}

?>