<?php

namespace Crmp\Commands\Address;

use Crmp\Domain\Address;
use Crmp\Domain\AddressToAddressAssociation;

/**
 * Create new association
 *
 * @package Crmp\Commands\Address
 */
class SetAssociationCommand
{
    public $assocType;
    public $left;
    public $right;
    public $title;

    /**
     * Config association.
     *
     * @param string  $title
     * @param Address $left
     * @param Address $right
     * @param int     $assocType
     */
    public function __construct(
        $title,
        Address $left,
        Address $right,
        $assocType = AddressToAddressAssociation::BOTH_DIRECTIONS
    ) {
        $this->title     = $title;
        $this->left      = $left;
        $this->right     = $right;
        $this->assocType = $assocType;
    }
}
