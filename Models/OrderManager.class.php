<?php
class OrderManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM orders");
		$orders = $query->fetchAll(PDO::FETCH_CLASS, 'Order', [$this->pdo]);
		return $orders;
	}

	public function find($id)
	{
		return $this->findByOrderNumber($id);
	}

	public function findByOrderNumber($order_Number)
	{
		$query = $this->pdo->prepare("SELECT * FROM orders WHERE order_Number=?");
		//$query = $this->pdo->prepare("SELECT COUNT(product_id) AS qte, product_id FROM orderdetails WHERE order_Number=? GROUP BY product_id");
		$query->execute([$order_Number]);
		$order = $query->fetchObject('Order', [$this->pdo]);
		return $order;
	}

	//Create, remove, save


	public function remove(Order $order)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM orders WHERE order_Number=?");
		$query->execute([$order->getOrderNumber()]);
	}

	public function create($customer)
	{
		$query = $this->pdo->prepare("INSERT INTO orders (order_number, order_Date, customer_id) VALUES(?, ?, ?)");
		$query->execute([$customer_id]);
		$id = $this->pdo->lastInsertId();
		return $this->findByOrderNumber($order_Number);
	}

	public function save(Order $order)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE orders SET order_number=?, order_date=?, customer_id=? WHERE order_number=?");
		$query->execute([$order->getOrderNumber(), $order->getOrderDate(), $order->getCustomerId()]);
		$products = $order->getProducts();
		$query_reset = $this->pdo->prepare("DELETE FROM orderdetails WHERE order_number=?");
		$query_reset->prepare([$order->getOrderNumber()]);
		$query_save = $this->pdo->prepare("INSERT INTO orderdetails (order_Number, products_id) VALUES(?, ?)");
		foreach ($order->getProducts() AS $product)
		{
			$query_save->execute([$order->getOrderNumber(), $product->getProductId()]);
		}
		return $this->find($order->getOrderNumber());
	}

}
?>