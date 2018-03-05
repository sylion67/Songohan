<?php
class ReservationsManager
{
    private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
    
	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM reservations WHERE id=?");
		$query->execute([$id]);
		$article = $query->fetchObject('reservations', [$this->pdo]);
		return $reservations;
	}

    public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM reservations");
		$article = $query->fetchAll(PDO::FETCH_CLASS, 'reservations', [$this->pdo]);
		return $reservations;
	}

	public function findById($id)
	{
		return $this->find($id);
	}
    
	public function create($reservation_id, $customer_id, $reservation_date, $client_number)
	{
		$query = $this->pdo->prepare("INSERT INTO article (reservation_id, customer_id, reservation_date, client_number) VALUES(?, ?, ?, ?)");
		$query->execute([$reservation_id, $customer_id, $reservation_date, $client_number]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
    
	public function remove(reservations $reservations)
	{
		$query = $this->pdo->prepare("DELETE FROM reservations WHERE id=?");
		$query->execute([$reservations->getId()]);
	}
    
	public function save(reservations $reservations)
	{
		$query = $this->pdo->prepare("UPDATE reservations SET reservation_id=?, customer_id=?, reservation_date=?, client_number WHERE id=?");
		$query->execute([$reservation_id->getReservation_Id(), $customer_id->getCustomer_Id(), $reservation_date->getReservation_Date, $client_number->getClient_Number()]);
		return $this->find($reservations->getId());
	}
}
?>