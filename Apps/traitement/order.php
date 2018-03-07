<?php
if (isset($_POST['action']))
{
	$manager = new OrderManager($pdo);
	$action = $_POST['action'];
	if ($action == 'order.create')
	{
		var_dump($_POST);
		if (isset($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['city'], $_POST['postalCode'], $_POST['nbProducts']))
		{
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$postalCode = $_POST['postalCode'];
			$nbProducts = $_POST['nbProducts'];


			$manager_cus = new CustomerManager($pdo);
			$customer = $manager_cus->create($firstName, $lastName, $phone, $address, $city, $postalCode, $email);
			$order = $manager->create($customer, $nbProducts);
			header('Location: index.php?page=articleadmin&id='.$reversation->getId());
			exit;
		}
	}
	else if ($action == 'order.edit')
	{
		if (isset($_POST['customer_id'] ))
		{
			$customer = $_POST['customer_id'];
			$id = $_POST['id'];
			$order = $manager->find($id);
			$manager->save($order);
			//$sql = "UPDATE orders SET title='".$title."', content='".$content."', picture='".$picture."', author='".$author."' WHERE id=".$id;
			//mysqli_query($db, $sql);
			header('Location: index.php?page=orderadmin&id='.$order->getOrderNumber());
			exit;
		}
	}
	else if ($action == 'order.delete')
	{
		if (isset($_POST['id']))
		{
			$id = $_POST['id'];
			$order = $manager->find($id);
			$manager->remove($order);
			//$sql = "DELETE FROM orders WHERE id=".$id;
			//mysqli_query($db, $sql);
			header('Location: index.php?page=listeorder');
			exit;
		}
	}
}

?>