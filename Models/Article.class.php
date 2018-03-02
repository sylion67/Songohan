<?php
class Article
{
	private $id;
	private $title;
	private $content;
	private $Picture;
	private $date;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getId()
	{
		return $this->id;
	}
	public function getTitle()
	{
		return $this->title;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}
	public function getContent()
	{
		return $this->content;
	}
	public function setContent($content)
	{
		$this->content = $content;
	}
	
	public function getPicture()
	{
		return $this->picture;
	}
	public function setPicture($picture)
	{
		$this->picture = $picture;
	}
	public function getDate()
	{
		return $this->date;
	}
	
}
?>