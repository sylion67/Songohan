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

	public function findByOrderNumber($order_Number)
	{
		$query = $this->pdo->prepare("SELECT * FROM orders WHERE order_Number=?");
		$query->execute([$order_Number]);
		$order = $query->fetchObject('Order', [$this->pdo]);
		return $order;
	}


}
?>