<?php

namespace Crmp\Domain\Associations;

/**
 * Association between to entities.
 *
 * @package Crmp\Domain\Associations
 */
abstract class AbstractAssociation {
	const BOTH_DIRECTIONS = 3;
	const LEFT_TO_RIGHT = 1;
	const NO_DIRECTION = 0;
	const RIGHT_TO_LEFT = 2;
	/**
	 * @var mixed
	 */
	protected $left;
	/**
	 * @var mixed
	 */
	protected $right;
	/**
	 * @var mixed
	 */
	protected $type;

	/**
	 * AddressToAddressAssociation constructor.
	 *
	 * @param string $title           Caption of the association.
	 * @param mixed  $left            One side of the business relation.
	 * @param mixed  $right           Other side of the business relation.
	 * @param int    $associationType Primary direction of demands or inquiries (related to the title).
	 */
	public function __construct( $title, $left, $right, $associationType = self::BOTH_DIRECTIONS ) {
		$this->title = $title;
		$this->left  = $left;
		$this->right = $right;
		$this->type  = $associationType;
	}

	/**
	 * @return mixed
	 */
	public function getLeft() {
		return $this->left;
	}

	/**
	 * @return mixed
	 */
	public function getRight() {
		return $this->right;
	}

	/**
	 * Type of business relation.
	 *
	 * The title indicates what type of relation the two addresses have.
	 * It is usually a business relation like "instructor" within companies
	 * or "supplier" between companies
	 * but can also be "husband" for more private data.
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}
}
