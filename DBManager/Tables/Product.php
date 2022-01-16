<?php

namespace src\DBManager\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Product")
 */
class Product
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * 
	 */
	private $id;
	/**
	 * @ORM\Column(type="string")
	 */
	private $price;
	/**
	 * @ORM\Column(type="float")
	 */
	private $weight;
	/**
	 * @ORM\Column(type="float", nullable="true")
	 */
	private $temperature;
	/**
	 * @ORM\Column(type="integer", nullable="true")
	 */
	private $discount;
	/**
	 * @ORM\Column(type="string", nullable="true")
	 */
	private $description;
	/**
	 * @ORM\Column(type="string", nullable="true")
	 */
	private $path;
	/**
	 * @ORM\Column(type="integer", nullable="true")
	 */
	private $quantity;
	/**
	 * @ORM\Column(type="string", nullable="true")
	 */
	private $title;
	/**
	 * @ORM\Column(type="string")
	 */
	private $kind;
	/**
	 * @ORM\Column(type="integer", nullable="true")
	 */
	private $brewQuantity;
	/**
	 * @ORM\Column(type="string", nullable="true")
	 */
	private $type;
	/**
	 * @ORM\Column(type="date", nullable="true")
	 */
	private $smokeDate;
	/**
	 * @ORM\Column(type="integer", nullable="true")
	 */
	private $brewTime;
	/**
	 * @ORM\Column(type="string", nullable="true")
	 */
	private $grind;
	/**
	 * @ORM\Column(type="integer") 
	 */
	private $idCountry;

	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the value of idCountry
	 */
	public function getIdCountry()
	{
		return $this->idCountry;
	}

	/**
	 * Set the value of idCountry
	 */
	public function setIdCountry($idCountry): self
	{
		$this->idCountry = $idCountry;

		return $this;
	}

	/**
	 * Get the value of price
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Set the value of price
	 */
	public function setPrice($price): self
	{
		$this->price = $price;

		return $this;
	}

	/**
	 * Get the value of weight
	 */
	public function getWeight()
	{
		return $this->weight;
	}

	/**
	 * Set the value of weight
	 */
	public function setWeight($weight): self
	{
		$this->weight = $weight;

		return $this;
	}

	/**
	 * Get the value of discount
	 */
	public function getDiscount()
	{
		return $this->discount;
	}

	/**
	 * Set the value of discount
	 */
	public function setDiscount($discount): self
	{
		$this->discount = $discount;

		return $this;
	}

	/**
	 * Get the value of description
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 */
	public function setDescription($description): self
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * Get the value of path
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * Set the value of path
	 */
	public function setPath($path): self
	{
		$this->path = $path;

		return $this;
	}

	/**
	 * Get the value of quantity
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * Set the value of quantity
	 */
	public function setQuantity($quantity): self
	{
		$this->quantity = $quantity;

		return $this;
	}

	/**
	 * Get the value of title
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Set the value of title
	 */
	public function setTitle($title): self
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * Get the value of brewQuantity
	 */
	public function getBrewQuantity()
	{
		return $this->brewQuantity;
	}

	/**
	 * Set the value of brewQuantity
	 */
	public function setBrewQuantity($brewQuantity): self
	{
		$this->brewQuantity = $brewQuantity;

		return $this;
	}

	/**
	 * Get the value of type
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Set the value of type
	 */
	public function setType($type): self
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * Get the value of smokeDate
	 */
	public function getSmokeDate()
	{
		return $this->smokeDate;
	}

	/**
	 * Set the value of smokeDate
	 */
	public function setSmokeDate($smokeDate): self
	{
		$this->smokeDate = $smokeDate;

		return $this;
	}

	/**
	 * Get the value of brewTime
	 */
	public function getBrewTime()
	{
		return $this->brewTime;
	}

	/**
	 * Set the value of brewTime
	 */
	public function setBrewTime($brewTime): self
	{
		$this->brewTime = $brewTime;

		return $this;
	}

	/**
	 * Get the value of grind
	 */
	public function getGrind()
	{
		return $this->grind;
	}

	/**
	 * Set the value of grind
	 */
	public function setGrind($grind): self
	{
		$this->grind = $grind;

		return $this;
	}

	/**
	 * Get the value of temperature
	 */
	public function getTemperature()
	{
		return $this->temperature;
	}

	/**
	 * Set the value of temperature
	 */
	public function setTemperature($temperature): self
	{
		$this->temperature = $temperature;

		return $this;
	}

	/**
	 * Get the value of kind
	 */
	public function getKind()
	{
		return $this->kind;
	}

	/**
	 * Set the value of kind
	 */
	public function setKind($kind): self
	{
		$this->kind = $kind;

		return $this;
	}
}
