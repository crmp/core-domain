<?php

namespace Crmp\Domain\Traits;

trait Tree {
	/**
	 * List of sub nodes.
	 *
	 * @var static[]
	 */
	protected $children;
	/**
	 * List of superordinate.
	 *
	 * @var static
	 */
	protected $parent;

	/**
	 * Add a sub entry.
	 *
	 * @param static $node
	 */
	public function append( $node ) {
		$this->children[] = $node;
	}

	public function getChildren() {
		return $this->children;
	}

	/**
	 * Get all subordinate.
	 *
	 * @return static
	 */
	public function getSuperordinate() {
		return $this->parent;
	}
}
