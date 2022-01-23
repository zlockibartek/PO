<?php

namespace src\DBManager\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="OrderEntity")
 */
class OrderEntity
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\OneToMany(targetEntity="OrderPosition", mappedBy="orderId")
	 * @ORM\GeneratedValue
	 */
	private $id;

	/**
	 * @ORM\Column(type="integer")
	 */
	private $price;
	/**
	 * @ORM\Column(type="string")
	 */
	private $paymentStatus;
	/**
	 * @ORM\Column(type="string")
	 */
	private $deliveryStatus;
	/**
	 * @ORM\Column(type="string")
	 */
	private $orderStatus;
	/**
	 * @ORM\Column(type="string")
	 */
	private $paymentMethod;
	/**
	 * @ORM\Column(type="datetime", nullable="true")
	 */
	private $paymentDate;
	/**
	 * @ORM\OneToOne(targetEntity="Note", mappedBy="id", cascade={"remove"})
	 * @ORM\Column(type="integer", nullable="true")
	 */
	private $noteId;
	/**
	 * @ORM\Column(type="integer", nullable="true")
	 */
	private $clientId;
	/**
	 * @ORM\Column(type="string")
	 */
	private $delivererId;
	/**
	 * @ORM\Column(type="integer")
	 */
	private $paymentAddressId;

	/**
	 * @ORM\Column(type="integer")
	 */
	private $deliveryAddressId;

	/**
	 * Get the value of id
	 */
	public function getId()
	{
		return $this->id;
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
	 * Get the value of clientId
	 */
	public function getClientId()
	{
		return $this->clientId;
	}

	/**
	 * Set the value of clientId
	 */
	public function setClientId($clientId): self
	{
		$this->clientId = $clientId;

		return $this;
	}

	/**
	 * Get the value of paymentStatus
	 */
	public function getPaymentStatus()
	{
		return $this->paymentStatus;
	}

	/**
	 * Set the value of paymentStatus
	 */
	public function setPaymentStatus($paymentStatus): self
	{
		$this->paymentStatus = $paymentStatus;

		return $this;
	}

	/**
	 * Get the value of deliveryStatus
	 */
	public function getDeliveryStatus()
	{
		return $this->deliveryStatus;
	}

	/**
	 * Set the value of deliveryStatus
	 */
	public function setDeliveryStatus($deliveryStatus): self
	{
		$this->deliveryStatus = $deliveryStatus;

		return $this;
	}

	/**
	 * Get the value of paymentDate
	 */
	public function getPaymentDate()
	{
		return $this->paymentDate;
	}

	/**
	 * Set the value of paymentDate
	 */
	public function setPaymentDate($paymentDate): self
	{
		$this->paymentDate = $paymentDate;

		return $this;
	}

	/**
	 * Get the value of paymentAddressId
	 */
	public function getPaymentAddressId()
	{
		return $this->paymentAddressId;
	}

	/**
	 * Set the value of paymentAddressId
	 */
	public function setPaymentAddressId($paymentAddressId): self
	{
		$this->paymentAddressId = $paymentAddressId;

		return $this;
	}

	/**
	 * Get the value of deliveryAddressId
	 */
	public function getDeliveryAddressId()
	{
		return $this->deliveryAddressId;
	}

	/**
	 * Set the value of deliveryAddressId
	 */
	public function setDeliveryAddressId($deliveryAddressId): self
	{
		$this->deliveryAddressId = $deliveryAddressId;

		return $this;
	}

	/**
	 * Get the value of orderStatus
	 */
	public function getOrderStatus()
	{
		return $this->orderStatus;
	}

	/**
	 * Set the value of orderStatus
	 */
	public function setOrderStatus($orderStatus): self
	{
		$this->orderStatus = $orderStatus;

		return $this;
	}
}
