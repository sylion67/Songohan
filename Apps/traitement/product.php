<?php
if (isset($_POST['action']))
{
	$manager = new ProductsManager($pdo);
	$action = $_POST['action'];
/*
      $uploaddir = 'Public/img/menu/';
*/
	if ($action == 'product.create')
	{
		if (isset($_POST['product_title'], $_POST['product_description'], $_POST['picture'], $_POST['price'], $_POST['type'] ))
		{
            $product_title = $_POST['product_title'];
            $product_description = $_POST['product_description'];
            $picture = $_POST['picture'];
            $price = $_POST['price'];
            $type = $_POST['type'];
            $product = $manager->create($product_title, $product_description, $price, $picture, $type);
            header('Location: index.php?page=editmenu&id='.$product->getProductId());
            exit;
		}
	}
	else if ($action == 'product.edit')
	{
		if (isset($_POST['product_title'], $_POST['product_description'], $_POST['picture'],$_POST['price'], $_POST['type'], $_POST['product_id'] ))
		{
            $product_title = $_POST['product_title'];
            $product_description = $_POST['product_description'];
            $picture = $_POST['picture'];
            $price = $_POST['price'];
            $type = $_POST['type'];
            $id = $_POST['product_id'];
            $product = $manager->find($id);
            $product->setProductTitle($product_title);
            $product->setProductDescription($product_description);
            $product->setPicture($picture);
            $product->setPrice($price);
            $product->setType($type);
            $manager->save($product);
            header('Location: index.php?page=editmenu&id='.$product->getProductId());
            exit;
		}
	}
	else if ($action == 'product.delete')
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
