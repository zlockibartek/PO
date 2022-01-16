<?php

namespace src\DBManager\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Order")
 */
class Order
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\OneToMany(targetEntity="OrderPoistion", mappedBy="orderId")
	 * @ORM\GeneratedValue
	 */
	private $id;

	/**
	 *@ORM\Column(type="integer")
	 */
	private $statusId;

	/**
	 * @ORM\Column(type="integer")
	 */
	private $price;
	/**
	 * @ORM\Column(type="string")
	 */
	private $paymentMethod;
	/**
	 * @ORM\OneToOne(targetEntity="Note", mappedBy="id", cascade={"remove"})
	 * @ORM\Column(type="integer")
	 */
	private $noteId;
	/**
	 * @ORM\Column(type="integer")
	 */
	private $userId;
	/**
	 * @ORM\Column(type="integer")
	 */
	private $delivererId;
/**
	 * @ORM\Column(type="integer")
	 */
	private $addressId;

	/**
	 * Get the value of id
	 */
	public function getId()
	{
		return $this->id;
	}

	

	/**
	 * Get the value of statusId
	 */
	public function getStatusId()
	{
		return $this->statusId;
	}

	/**
	 * Set the value of statusId
	 */
	public function setStatusId($statusId): self
	{
		$this->statusId = $statusId;

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
	 * Get the value of paymentMethod
	 */
	public function getPaymentMethod()
	{
		return $this->paymentMethod;
	}

	/**
	 * Set the value of paymentMethod
	 */
	public function setPaymentMethod($paymentMethod): self
	{
		$this->paymentMethod = $paymentMethod;

		return $this;
	}

	/**
	 * Get the value of noteId
	 */
	public function getNoteId()
	{
		return $this->noteId;
	}

	/**
	 * Set the value of noteId
	 */
	public function setNoteId($noteId): self
	{
		$this->noteId = $noteId;

		return $this;
	}

	/**
	 * Get the value of userId
	 */
	public function getUserId()
	{
		return $this->userId;
	}

	/**
	 * Set the value of userId
	 */
	public function setUserId($userId): self
	{
		$this->userId = $userId;

		return $this;
	}

	/**
	 * Get the value of delivererId
	 */
	public function getDelivererId()
	{
		return $this->delivererId;
	}

	/**
	 * Set the value of delivererId
	 */
	public function setDelivererId($delivererId): self
	{
		$this->delivererId = $delivererId;

		return $this;
	}

	/**
	 * Get the value of addressId
	 */
	public function getAddressId()
	{
		return $this->addressId;
	}

	/**
	 * Set the value of addressId
	 */
	public function setAddressId($addressId): self
	{
		$this->addressId = $addressId;

		return $this;
	}
}
