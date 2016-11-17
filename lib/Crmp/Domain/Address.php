<?php

namespace Crmp\Domain;

/**
 * Address
 *
 * An address usually contains information about a person or a company.
 *
 * @package Crmp\Domain
 */
class Address implements SoftDeleteInterface
{
    /**
     * Related addresses.
     *
     * @var Address[]
     */
    protected $relatedAddresses;
    /**
     * EMail
     *
     * @var string
     */
    private $email;
    /**
     * Mark an address deprecated.
     *
     * @var bool
     */
    private $enabled;
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

    /**
     * Create new address.
     *
     * @param int    $id      Identifier for this address.
     * @param string $name    Name of the person or company.
     * @param string $email   E-Mail address of the person or company.
     * @param bool   $enabled Check this if the address should be disabled.
     */
    public function __construct($id, $name, $email, $enabled)
    {
        $this->id      = $id;
        $this->name    = $name;
        $this->email   = $email;
        $this->enabled = $enabled;
    }

    /**
     * Add a related address.
     *
     * @param Address $address
     */
    public function addRelatedAddress(Address $address)
    {
        $this->relatedAddresses[] = $address;
    }

    /**
     * Disable the entity.
     *
     * @return mixed
     */
    public function disable()
    {
        $this->enabled = false;
    }

    /**
     * Recover the entity.
     *
     * @return mixed
     */
    public function enable()
    {
        $this->enabled = true;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get all related addresses.
     *
     * Addresses can not only be split into a tree
     * but also refer to some totally different addresses.
     * The difference between a sub-address
     * and a related address is,
     * that the related does not have to be a child or parent of the current address.
     * It can come from a total different place within the whole bulk of addresses.
     *
     * @return Address[]
     */
    public function getRelatedAddresses()
    {
        return $this->relatedAddresses;
    }

    /**
     * Check if disabled.
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return (bool) $this->enabled;
    }
}
