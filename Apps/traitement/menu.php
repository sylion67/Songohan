<?php
if (isset($_POST['action']))
{
	$manager = new ProductsManager($pdo);
	$action = $_POST['action'];
      $uploaddir = 'Public/img/menu/';
	if ($action == 'menu.create')
	{
		if (isset($_POST['product_title'], $_POST['product_description'], $_POST['picture'], $_POST['price'], $_POST['type'] ))
		{
            $product_title = $_POST['product_title'];
            $product_description = $_POST['product_description'];
            $picture = $uploaddir.$_POST['picture'];
            $price = $_POST['price'];
            $type = $_POST['type'];
            $products = $manager->create($product_title, $product_description, $price, $picture, $type);
            var_dump($products);
            //header('Location: index.php?page=editmenu');
            //exit;
		}
	}
	else if ($action == 'menu.edit')
	{
		if (isset($_POST['product_title'], $_POST['product_description'], $_POST['picture'],$_POST['price'] ))
		{
            $product_title = $_POST['product_title'];
            $product_description = $_POST['product_description'];
            $picture = $uploaddir.$_POST['picture'];
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
	else if ($action == 'menu.delete')
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
