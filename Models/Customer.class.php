<?php
// User.class.php : http://192.168.1.22/partage/User.class.php
class Customer
{
	// Propriétés (variables)
	private $customer_id;
	private $customer_FirstName;
	private $customer_LastName;
	private $phone;
	private $addressLine;
	private $city;
	private $postalCode;
	private $email;

	// Méthodes (fonctions)
	public function getCustomerId()// getter de id
	{
		return $this->customer_id;
	}


	public function getCustomerFirstName()
	{
		return $this->customer_FirstName;
	}
	public function setCustomerFirstName($customer_FirstName)
	{
		$this->customer_FirstName = $customer_FirstName;
	}

	public function getCustomerLastName()
	{
		return $this->customer_LastName;
	}
	public function setCustomerLastName($customer_LastName)
	{
		$this->customer_LastName = $customer_LastName;
	}

	public function getPhone()
	{
		return $this->phone;
	}
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	public function getAddressLine()
	{
		return $this->addressLine;
	}
	public function setAddressLine($addressLine)
	{
		$this->addressLine = $addressLine;
	}

	public function getCity()
	{
		return $this->city;
	}
	public function setCity($city)
	{
		$this->city = $city;
	}

	public function getPostalCode()
	{
		return $this->postalCode;
	}
	public function setPostalCode($postalCode)
	{
		$this->postalCode = $postalCode;
	}

	
	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
}

?>