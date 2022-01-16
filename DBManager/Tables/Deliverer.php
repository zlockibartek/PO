<?php

namespace src\DBManager\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Deliverer")
 */
class Deliverer
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="string")
	 */
	private $name;

	
	/**
	 *@ORM\Column(type="integer")
	 */
	private $price;

	/**
	 * @ORM\Column(type="float")
	 */
	private $maxWeight;

	/**
	 * Get the value of name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 */
	public function setName($name): self
	{
		$this->name = $name;

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
	 * Get the value of maxWeight
	 */
	public function getMaxWeight()
	{
		return $this->maxWeight;
	}

	/**
	 * Set the value of maxWeight
	 */
	public function setMaxWeight($maxWeight): self
	{
		$this->maxWeight = $maxWeight;

		return $this;
	}
}
