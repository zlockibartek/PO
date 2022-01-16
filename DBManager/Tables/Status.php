<?php

namespace src\DBManager\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Status")
 */
class Status
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private $id;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	private $paymentStatus;


	/**
	 * @ORM\Column(type="integer")
	 */
	private $quantity;


}
