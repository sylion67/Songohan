<?php
class Order
{
	private $order_Number;
	private $order_Date;
	private $customer_id;
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getOrderNumber()
	{
		return $this->order_Number;
	}

	public function getOrderDate()
	{
		return $this->order_Date;
	}

	public function getCustomerId()
	{
		return $this->customer_id;
	}

	public function setCustomerId()
	{
		$this->customer_id = $customer_id;
	}
}
?>