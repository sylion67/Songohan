<?php
if (isset($_POST['action']))
{
	$manager = new OrderManager($pdo);
	$action = $_POST['action'];
	if ($action == 'order.create')
	{
		var_dump($_POST);
		if (isset($_POST['customer_id']))
		{
			$customer = $_POST['customer_id'];
			//$order = $manager->create($customer);
			// $sql = "INSERT INTO orders (title, content, picture, author) VALUES('".$title."', '".$content."', '".$picture."', '".$author."')";
			// mysqli_query($db, $sql);
			//header('Location: index.php?page=orderadmin&id='.$order->getOrderNumber());
			//exit;
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