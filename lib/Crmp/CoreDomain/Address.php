<?php

namespace Crmp\CoreDomain;

class Address {
	/**
	 * EMail
	 *
	 * @var string
	 */
	private $email;

	/**
	 * Identifier
	 *
	 * @var int
	 */
	private $id;

	/**
	 * Name
	 *
	 * @var string
	 */
	private $name;

	public function __construct( $id, $name, $email ) {
		$this->id    = $id;
		$this->name  = $name;
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
}