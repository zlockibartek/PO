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
	 * @ORM\Column(type="date", nullable="true")
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
}
