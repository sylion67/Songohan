<?php
if (isset($_POST['action']))
{
	$manager = new ProductsManager($pdo);
	$action = $_POST['action'];
	if ($action == 'create')
	{
		if (isset($_POST['product_title'], $_POST['product_description'], $_POST['picture'], $_POST['price'] ))
		{
            $product_title = $_POST['product_title'];
            $product_description = $_POST['product_description'];
            $picture = $_POST['picture'];
            $price = $_POST['price'];
            $products = $manager->create($product_title, $product_description, $picture, $price);
            header('Location: index.php?page=editmenu');
            exit;
		}
	}
	else if ($action == 'edit')
	{
		if (isset($_POST['product_title'], $_POST['product_description'], $_POST['picture'],$_POST['price'] ))
		{
            $product_title = $_POST['product_title'];
            $product_description = $_POST['product_description'];
            $picture = $_POST['picture'];
            $price = $_POST['price'];
            $id = $_POST['id'];
            $products = $manager->find($id);
            $products->setProductTitle($product_title);
            $products->setProductDescription($product_description);
            $products->setPicture($picture);
            $products->setPrice($price);
            $manager->save($products);
            header('Location: index.php?page=editmenu');
            exit;
		}
	}
	else if ($action == 'delete')
	{
		if (isset($_POST['id']))
		{
            $id = $_POST['id'];
            $products = $manager->find($id);
            $manager->remove($products);
            header('Location: index.php?page=editmenu');
            exit;
		}
	}
}

?>
