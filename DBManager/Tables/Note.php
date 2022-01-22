<?php

namespace src\DBManager\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Note")
 */
class Note
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private $id;

	/**
	 *@ORM\Column(type="integer")
	 */
	private $NIP;

	/**
	 * @ORM\Column(type="string")
	 */
	private $tax;
	/**
	 * @ORM\Column(type="datetime", nullable="true")
	 */
	private $date;
	/**
	 *@ORM\Column(type="integer")
	 */
	private $orderId;

	/**
	 * Get the value of id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the value of NIP
	 */
	public function getNIP()
	{
		return $this->NIP;
	}

	/**
	 * Set the value of NIP
	 */
	public function setNIP($NIP): self
	{
		$this->NIP = $NIP;

		return $this;
	}

	/**
	 * Get the value of tax
	 */
	public function getTax()
	{
		return $this->tax;
	}

	/**
	 * Set the value of tax
	 */
	public function setTax($tax): self
	{
		$this->tax = $tax;

		return $this;
	}

	/**
	 * Get the value of date
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * Set the value of date
	 */
	public function setDate($date): self
	{
		$this->date = $date;

		return $this;
	}

	/**
	 * Get the value of orderId
	 */
	public function getOrderId()
	{
		return $this->orderId;
	}

	/**
	 * Set the value of orderId
	 */
	public function setOrderId($orderId): self
	{
		$this->orderId = $orderId;

		return $this;
	}
}
