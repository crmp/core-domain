<?php

namespace Crmp\Domain\Traits;

use Crmp\Domain\Associations\AbstractAssociation;

trait Associative {
	/**
	 * Associations with other entities.
	 *
	 * @var AbstractAssociation[]
	 */
	protected $associations;

	/**
	 * @param AbstractAssociation $association
	 */
	public function addAssociation( AbstractAssociation $association ) {
		$this->associations[] = $association;
	}

	public function getAssociations() {
		return $this->associations;
	}
}
