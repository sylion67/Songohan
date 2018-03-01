<?php
// User.class.php : http://192.168.1.22/partage/User.class.php
class Comment
{
	// Propriétés (variables)
	private $id;// private = protégé de l'extérieur => encapsulation
	private $id_article;
	private $id_author;
	private $content;
	private $date;

	// Méthodes (fonctions)
	public function getId()// getter de id
	{
		return $this->id;
	}


	public function getIdArticle()
	{
		return $this->id_article;
	}
	public function setIdArticle($id_article)
	{
		$this->id_article = $id_article;
	}


	public function getContent()
	{
		return $this->content;
	}
	public function setContent($content)
	{
		$this->content = $content;
	}


	public function getIdAuthor()
	{
		return $this->id_author;
	}
	public function setIdAuthor($id_author)
	{
		$this->id_author = $id_author;
	}


	public function getDate()
	{
		return $this->date;
	}
}
?>