<?php

namespace src\DBManager\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="OrderPosition")
 */
class OrderPosition
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	private $orderId;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	private $productId;


	/**
	 * @ORM\Column(type="integer")
	 */
	private $quantity;

	

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

	/**
	 * Get the value of productId
	 */
	public function getProductId()
	{
		return $this->productId;
	}

	/**
	 * Set the value of productId
	 */
	public function setProductId($productId): self
	{
		$this->productId = $productId;

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
}
