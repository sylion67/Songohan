<?php
class ProductsManager
{

	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function find($product_id)
	{
		$query = $this->pdo->prepare("SELECT * FROM products WHERE product_id=?");
		$query->execute([$product_id]);
		$products = $query->fetchObject('Products',[$this->pdo]);
		return $products;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM products");
		$products = $query->fetchAll(PDO::FETCH_CLASS, 'Products',[$this->pdo]);
		return $products;
	}
	
	public function findById($product_id)
	{
		return $this->find($id);
	}
	public function findByOrder(Order $order)
	{
		$query = $this->pdo->prepare("SELECT products.* FROM products LEFT JOIN orderdetails ON orderdetails.product_id=products.product_id WHERE orderdetails.order_Number=?");
		$query->execute([$order->getOrderNumber()]);
		$products = $query->fetchAll(PDO::FETCH_CLASS, 'Products',[$this->pdo]);
		return $products;
	}

	public function countByOrder(Order $order)
	{
		$query = $this->pdo->prepare("SELECT products.*, COUNT(products.product_id) AS qte FROM products LEFT JOIN orderdetails ON orderdetails.product_id=products.product_id WHERE orderdetails.order_Number=? GROUP BY products.product_id");
		$query->execute([$order->getOrderNumber()]);
		$products = $query->fetchAll(PDO::FETCH_CLASS, 'Products', [$this->pdo]);
		return $products;
	}


	public function create($product_title, $product_description, $price, $picture, $type)
	{
		// var_dump($title);
        $product = new Products($this->pdo);
        $product->setProductTitle($product_title);
        $product->setProductDescription($product_description);
        $product->setPrice($price);
        $product->setPicture($picture);
        $product->setType($type);
		$query = $this->pdo->prepare("INSERT INTO products (product_title, product_description, price, picture, type) VALUES(?, ?, ?, ?, ?)");
		$query->execute([$product->getProductTitle(), $product->getProductDescription(), $product->getPrice(), $product->getPicture(), $product->getType()]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
	public function remove(products $products)
	{
		$query = $this->pdo->prepare("DELETE FROM products WHERE product_id=?");
		$query->execute([$products->getProductId()]);

	}
	public function save(products $products)
	{
		$query = $this->pdo->prepare("UPDATE products SET product_title=?, product_description=?,price=?, picture=?, type=? WHERE product_id=?");
		$query->execute([$products->getProductTitle(), $products->getProductDescription(), $products->getPrice(), $products->getPicture(), $products->getType(), $products->getProductId()]);
		return $this->find($products->getProductId());
	}
}
?>