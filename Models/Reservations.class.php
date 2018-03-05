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
		return $this->id;
	}
    
    public function getCustomer_Id()
	{
		return $this->id;
	}
    
	public function getReservation_Date($reservation_date)
	{
		return $this->reservation_date;
	}
	public function setreservation_date($reservation_date)
	{
		$this->reservation_date = $reservation_date;
	}
    
    public function getClient_Number($client_number)
	{
		return $this->client_number;
	}
	public function setClient_Number($client_number)
	{
		$this->client_number = $client_number;
	}
}
?>



