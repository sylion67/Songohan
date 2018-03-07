<?php
class CustomerManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function find($customer_id)
	{
		$query = $this->pdo->prepare("SELECT * FROM customers WHERE customer_id=?");

		$res = $query->execute([$customer_id]);
		$customer = $query->fetchObject('Customer');
		return $customer;
	}

	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM customers");
		$customers = $query->fetchAll(PDO::FETCH_CLASS, 'Customer');
		return $customers;
	}

	public function findByCustomerId($customer_id)// getById
	{
		return $this->find($customer_id);
	}


	public function findByFirstName($customer_FirstName)// getByLogin
	{
		$query = $this->pdo->prepare("SELECT * FROM customers WHERE customer_FirstName=?");
		$query->execute([$customer_FirstName]);
		$customer = $query->fetchObject('Customer');
		return $customer;
	}

	public function findByLastName($customer_LastName)// getByLogin
	{
		$query = $this->pdo->prepare("SELECT * FROM customers WHERE customer_LastName=?");
		$query->execute([$customer_LastName]);
		$customer = $query->fetchObject('Customer');
		return $customer;
	}

	public function findByEmail($email)// getByEmail
	{
		$query = $this->pdo->prepare("SELECT * FROM customers WHERE email=?");
		$query->execute([$email]);
		$customer = $query->fetchObject('Customer');
		return $customer;
	}




	public function create($firstName, $lastName, $phone, $address, $city, $postalCode, $email)
	{
		/*$customer = new Customer();
		$customer->setLogin($customer_LastName);
		$customer->setPassword($password);
		$customer->setEmail($email);*/
		$query = $this->pdo->prepare("INSERT INTO customers (customer_FirstName, customer_LastName, phone, addressLine, city, postalCode, email) VALUES(?, ?, ?, ?, ?, ?, ?)");
		//$query->execute([$customer->getFirstName(), $customer->getLastName(), $customer->getPhone(), $customer->getAddressLine(), $customer->getCity(), $customer->getPostalCode(), $customer->getEmail()]);
		$query->execute([$firstName, $lastName, $phone, $address, $city, $postalCode, $email]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}

	public function remove(User $customer) //<= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM customers WHERE customer_id=?");
		$query->execute([$customer->getCustomerId()]);
	}

	public function save(User $customer)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE customers SET customer_FirstName=?, customer_LastName=?, phone=?, addressLine=?, city=?, postalCode=?, email=? WHERE customer_id=?");
		$query->execute([$customer->getFirstName(), $customer->getLastName(), $customer->getPhone(), $customer->getAddressLine(), $customer->getCity(), $customer->getPostalCode(), $customer->getEmail(), $customer->getCustomerId()]);
		return $this->find($customer->getCustomerId());
	}


}
?>