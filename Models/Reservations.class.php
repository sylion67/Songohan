<?php
class Reservations
{
	private $reservation_id;
	private $customer_id;
	private $reservation_date;
    private $reservation_hour;
	private $client_number;
    private $customer;


	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getReservation_Id()
	{
		return $this->reservation_id;
	}
    
    public function getCustomer_Id()
	{
		return $this->customer_id;
	}
    
	public function getReservation_Date()
	{
		return $this->reservation_date;
	}
	public function setreservation_date($reservation_date)
	{
		$this->reservation_date = $reservation_date;
	}
    
    	public function getReservation_Hour()
	{
		return $this->reservation_hour;
	}
	public function setreservation_hour($reservation_hour)
	{
		$this->reservation_hour = $reservation_hour;
	}
    
    public function getClient_Number()
	{
		return $this->client_number;
	}
	public function setClient_Number($client_number)
	{
		$this->client_number = $client_number;
	}
    
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



