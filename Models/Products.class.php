<?php
class Products
{

	private $product_id;
	private $product_title;
	private $product_description;
	private $price;
	private $picture;
	private $type;
	
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getProductId()
	{
		return $this->product_id;
	}
	public function getProductTitle()
	{
		return $this->product_title;
	}
	public function setProductTitle($product_title)
	{
		// if ()
		$this->product_title = $product_title;
	}
	public function getProductDescription()
	{
		return $this->product_description;
	}
	public function setProductDescription($product_description)
	{
		$this->product_description = $product_Description;
	}
	public function getPrice()
	{
		return $this->price;
	}
	public function setPrice($price)
	{
		$this->price = $price;
	}
	public function getPicture()
	{
		return $this->picture;
	}
	public function setPicture($picture)
	{
		$this->picture = $picture;
	}
	public function getType()
	{
		return $this->type;
	}
	public function setType($type)
	{
		$this->type = $type;
	}




}

?>