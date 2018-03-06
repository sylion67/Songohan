<?php
// User.class.php : http://192.168.1.22/partage/User.class.php
class Comment
{
	// Propriétés (variables)
	private $id;// private = protégé de l'extérieur => encapsulation
	private $author;
	private $content;
	private $rating;

	// Méthodes (fonctions)
	public function getId()// getter de id
	{
		return $this->id;
	}


	public function getContent()
	{
		return $this->content;
	}
	public function setContent($content)
	{
		$this->content = $content;
	}


	public function getAuthor()
	{
		return $this->author;
	}
	public function setAuthor($author)
	{

		$this->author = $author;
	}

	public function getRating()
	{
		return $this->rating;
	}
	public function setRating($rating)
	{
		if ($rating < 0)
			throw new Exception("La note ne peut pas être inférieure à 0");
		$this->rating = $rating;
	}
}
?>