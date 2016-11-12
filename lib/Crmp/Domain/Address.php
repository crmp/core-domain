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
     * Mark an address deprecated.
     *
     * @var bool
     */
    private $enabled;
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
     * Check if disabled.
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return (bool) $this->enabled;
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
}
