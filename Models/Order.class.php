<?php
class Order
{
	private $order_Number;
	private $order_Date;
	private $customer_id;

	private $customer;
	private $products;

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

	public function addProduct(Products $products)
	{
		$this->getProducts();
		$this->products[] = $products;
	}
	public function removeProduct(Products $products)
	{
		$this->getProducts();
		// $this->products[] = $products;
	}
	public function getProducts()
	{
		if ($this->products === null)
		{
			$manager = new ProductsManager($this->pdo);
			$this->products = $manager->findByOrder($this);
		}
		return $this->products;
	}

	/*public function getCustomerId()
	{
		return $this->customer_id;
	}*/
	public function getCustomer()
	{
		$manager = new CustomerManager($this->pdo);
		$this->customer = $manager->find($this->customer_id);
		return $this->customer;
	}

	/*public function setCustomerId($customer_id)
	{
		$this->customer_id = $customer_id;
	}*/
	public function setCustomer(Customer $customer)
	{
		$this->customer_id = $customer->getId();
		$this->customer = $customer;
	}
}
?>