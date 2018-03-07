<?php
var_dump($_POST);
if (isset($_POST['action']))
{
	$manager_resa = new ReservationsManager($pdo);
	$action = $_POST['action'];
	if ($action == 'reservation.create')
	{
		if (isset($_POST['firstName'], $_POST['hour'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['city'], $_POST['postalCode'], $_POST['date'], $_POST['nbClient']))
		{
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$postalCode = $_POST['postalCode'];
			$date = $_POST['date'];
			$hour = $_POST['hour'];
			$nbClient = $_POST['nbClient'];

			$postalCode = '1324';

			$manager_cus = new CustomerManager($pdo);
			$customer = $manager_cus->create($firstName, $lastName, $phone, $address, $city, $postalCode, $email);
			$reservation = $manager_resa->create($customer, $date, $hour, $nbClient);
			//header('Location: index.php?page=articleadmin&id='.$reversation->getId());
			var_dump($reservation);
			exit;
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