<?php
class Reservations
{
	private $reservation_id;
	private $customer_id;
	private $reservation_date;
	private $client_Number;


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
    
    public function getClient_Number()
	{
		return $this->client_number;
	}
	public function setClient_Number($client_number)
	{
		$this->client_number = $client_number;
	}
}
?>



