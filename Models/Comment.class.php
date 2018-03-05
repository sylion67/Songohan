<?php
// User.class.php : http://192.168.1.22/partage/User.class.php
class Comment
{
	// Propriétés (variables)
	private $id;// private = protégé de l'extérieur => encapsulation
	private $author;
	private $content;
	private $date;
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
		return $this->id_author;
	}
	public function setAuthor($author)
	{
		$this->author = $author;
	}


	public function getDate()
	{
		return $this->date;
	}

	public function getRating()
	{
		return $this->id_author;
	}
	public function setRating($rating)
	{
		$this->rating = $rating;
	}
}
?>