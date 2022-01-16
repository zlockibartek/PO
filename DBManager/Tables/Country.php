<?php

namespace src\DBManager\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Country")
 */
class Country
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\OneToMany(targetEntity="Product", mappedBy="idCountry", cascade={"remove"})
	 * @ORM\GeneratedValue
	 */
	private $id;

	/**
	 *@ORM\Column(type="string")
	 */
	private $name;

	/**
	 * @ORM\Column(type="string")
	 */
	private $type;

	/**
	 * Get the value of id
	 */
	public function getId()
	{
		return $this->id;
	}

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
}
