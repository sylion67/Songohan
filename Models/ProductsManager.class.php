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
	public function create($product_title, $product_description, $price, $picture, $type)
	{
		// var_dump($title);
		$query = $this->pdo->prepare("INSERT INTO products (product_title, product_description, price, picture, type) VALUES(?, ?, ?, ?, ?)");
		$query->execute([$product_title, $product_description, $price, $picture, $type]);
		$id = $this->pdo->lastInsertId();
		return $this->find($product_id);
	}
	public function remove(products $products)
	{
		$query = $this->pdo->prepare("DELETE FROM products WHERE id=?");
		$query->execute([$products->getProductId()]);

	}
	public function save(products $products)
	{
		$query = $this->pdo->prepare("UPDATE products SET product_title=?, product_description=?,price=?,  picture=?,type=? WHERE id=?");
		$query->execute([$products->getProductTitle(), $products->getProductDescription(), $products-> price(), $products->getPicture(), $products->getType(), $products->getId()]);
		return $this->find($products->getProductId());
	}
}
?>