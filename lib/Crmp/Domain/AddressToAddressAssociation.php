<?php

namespace Crmp\Domain;

/**
 * Association between to addresses.
 *
 * @package Crmp\Domain
 */
class AddressToAddressAssociation
{
    const BOTH_DIRECTIONS = 3;
    const LEFT_TO_RIGHT   = 1;
    const NO_DIRECTION    = 0;
    const RIGHT_TO_LEFT   = 2;
    /**
     * @var Address
     */
    protected $leftAddress;
    /**
     * @var Address
     */
    protected $rightAddress;
    /**
     * @var Address
     */
    protected $type;

    /**
     * AddressToAddressAssociation constructor.
     *
     * @param string  $title           Caption of the association.
     * @param Address $leftAddress     One side of the business relation.
     * @param Address $rightAddress    Other side of the business relation.
     * @param int     $associationType Primary direction of demands or inquiries (related to the title).
     */
    public function __construct($title, $leftAddress, $rightAddress, $associationType = self::BOTH_DIRECTIONS)
    {
        $this->title        = $title;
        $this->leftAddress  = $leftAddress;
        $this->rightAddress = $rightAddress;
        $this->type         = $associationType;
    }

    /**
     * @return Address
     */
    public function getLeftAddress()
    {
        return $this->leftAddress;
    }

    /**
     * @return Address
     */
    public function getRightAddress()
    {
        return $this->rightAddress;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return Address
     */
    public function getType()
    {
        return $this->type;
    }
}
