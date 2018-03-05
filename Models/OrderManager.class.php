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

	//Create, remove, save


	public function remove(Order $order)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM orders WHERE order_Number=?");
		$query->execute([$order->getOrderNumber()]);
	}

	public function create($customer_id)
	{
		$query = $this->pdo->prepare("INSERT INTO orders (order_number, order_Date, customer_id) VALUES(?, ?, ?)");
		$query->execute([$customer_id]);
		$id = $this->pdo->lastInsertId();
		return $this->findByOrderNumber($order_Number);
	}

	/*public function save(Order $order)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE orders SET order_number=?, order_date=?, customer_id=?, note=? WHERE id=?");
		$query->execute([$order->getOrderNumber(), $order->getOrderDate(), $order->getCustomerId()]);
		return $this->find($order->getId());*/
	}

}
?>