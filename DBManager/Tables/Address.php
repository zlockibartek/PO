<?php

namespace src\DBManager\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Address")
 */
class Address
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private $id;

	/**
	 *@ORM\Column(type="string")
	 */
	private $town;

	/**
	 * @ORM\Column(type="string")
	 */
	private $street;
	/**
	 * @ORM\Column(type="string")
	 */
	private $building;
	/**
	 * @ORM\Column(type="string")
	 */
	private $apartament;
	/**
	 * @ORM\Column(type="string")
	 */
	private $postalCode;

	/**
	 * Get the value of id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the value of town
	 */
	public function getTown()
	{
		return $this->town;
	}

	/**
	 * Set the value of town
	 */
	public function setTown($town): self
	{
		$this->town = $town;

		return $this;
	}

	/**
	 * Get the value of street
	 */
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * Set the value of street
	 */
	public function setStreet($street): self
	{
		$this->street = $street;

		return $this;
	}

	/**
	 * Get the value of building
	 */
	public function getBuilding()
	{
		return $this->building;
	}

	/**
	 * Set the value of building
	 */
	public function setBuilding($building): self
	{
		$this->building = $building;

		return $this;
	}

	/**
	 * Get the value of apartament
	 */
	public function getApartament()
	{
		return $this->apartament;
	}

	/**
	 * Set the value of apartament
	 */
	public function setApartament($apartament): self
	{
		$this->apartament = $apartament;

		return $this;
	}

	/**
	 * Get the value of postalCode
	 */
	public function getPostalCode()
	{
		return $this->postalCode;
	}

	/**
	 * Set the value of postalCode
	 */
	public function setPostalCode($postalCode): self
	{
		$this->postalCode = $postalCode;

		return $this;
	}
}
