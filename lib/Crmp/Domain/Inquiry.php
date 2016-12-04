<?php

namespace Crmp\Domain;

use Crmp\Domain\Traits\Tree;

/**
 * Inquiry
 *
 * @package Crmp\Domain
 */
class Inquiry {

	use Tree;

	/**
	 * Add related addresses.
	 *
	 * @var Address[]
	 */
	protected $addresses;
	/**
	 * Description of the inquiry.
	 *
	 * @var string
	 */
	protected $content;
	/**
	 * Title of the inquiry.
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * Create new inquiry.
	 *
	 * @param string    $title     Subject.
	 * @param string    $content   Description.
	 * @param Address[] $addresses Related addresses.
	 * @param static    $superordinate
	 */
	public function __construct( $title, $content, $addresses = [], $superordinate = null ) {
		$this->title     = $title;
		$this->content   = $content;
		$this->addresses = $addresses;
		$this->parent    = $superordinate;
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

	/**
	 * Description.
	 *
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Receive title.
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}
}
