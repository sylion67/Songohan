<?php
class ReservationsManager
{
    private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
    
	public function find($reservation_id)
	{
		$query = $this->pdo->prepare("SELECT * FROM reservations WHERE id=?");
		$query->execute([$id]);
		$reservations = $query->fetchObject('Reservations', [$this->pdo]);
		return $reservations;
	}

    public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM reservations");
		$reservations = $query->fetchAll(PDO::FETCH_CLASS, 'Reservations', [$this->pdo]);
		return $reservations;
	}

	public function findById($reservation_id)
	{
		return $this->find($id);
	}
    
	public function create($reservation_id, $customer_id, $reservation_date, $reservation_hour, $client_number)
	{
		$query = $this->pdo->prepare("INSERT INTO article (reservation_id, customer_id, reservation_date, reservation_hour, client_number) VALUES(?, ?, ?, ?)");
		$query->execute([$reservation_id, $customer_id, $reservation_date, $reservation_hour, $client_number]);
		$id = $this->pdo->lastInsertId();
		return $this->find($reservation_id);
	}
    
	public function remove(reservations $reservations)
	{
		$query = $this->pdo->prepare("DELETE FROM reservations WHERE reservation_id=?");
		$query->execute([$reservations->getId()]);
	}
    
	public function save(reservations $reservations)
	{
		$query = $this->pdo->prepare("UPDATE reservations SET reservation_id=?, customer_id=?, reservation_date=?, reservation_hour=?, client_number WHERE reservation_id=?");
		$query->execute([$reservation_id->getReservation_Id(), $customer_id->getCustomer_Id(), $reservation_date->getReservation_Date(), $reservation_hour->getReservationDate(), $client_number->getClient_Number()]);
		return $this->find($reservations->getReservation_Id());
	}
}
?>