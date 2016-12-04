<?php

namespace Crmp\Domain;

/**
 * Inquiry
 *
 * @package Crmp\Domain
 */
class Inquiry {
	/**
	 * Add related addresses.
	 *
	 * @var Address[]
	 */
	protected $addresses;

	/**
	 * Create new inquiry.
	 *
	 * @param Address[] $addresses Related addresses.
	 */
	public function __construct( $addresses = [] ) {
		$this->addresses = $addresses;
	}

	public function appendAddress( Address $address ) {
		$this->addresses[] = $address;
	}

	/**
	 * Get all addresses.
	 *
	 * @return Address[]
	 */
	public function getAddresses() {
		return $this->addresses;
	}
}
