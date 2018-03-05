<?php
class UserManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM admin WHERE id=?");

		$res = $query->execute([$id]);
		$user = $query->fetchObject('User');
		return $user;
	}

	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM admin");
		$users = $query->fetchAll(PDO::FETCH_CLASS, 'User');
		return $users;
	}

	public function findById($id)// getById
	{
		return $this->find($id);
	}


	public function findByLogin($login)// getByLogin
	{
		$query = $this->pdo->prepare("SELECT * FROM admin WHERE login=?");
		$query->execute([$login]);
		$user = $query->fetchObject('User');
		return $user;
	}


	public function create($login, $password)
	{
		$user = new User(/*$this->db*/);
		$user->setLogin($login);
		$user->setPassword($password);
		$query = $this->pdo->prepare("INSERT INTO admin (login, password) VALUES(?, ?)");
		$query->execute([$user->getLogin(), $user->getHash()]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}

	public function remove(User $user) //<= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM users WHERE id=?");
		$query->execute([$user->getId()]);
	}

	public function save(User $user)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE users SET login=?, password=? WHERE id=?");
		$query->execute([$user->getLogin(), $user->getPassword(), $user->getId()]);
		return $this->find($user->getId());
	}


}
?>