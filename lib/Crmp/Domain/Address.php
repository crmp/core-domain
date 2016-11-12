<?php

namespace Crmp\Domain;

/**
 * Address
 *
 * An address usually contains information about a person or a company.
 *
 * @package Crmp\Domain
 */
class Address
{
    /**
     * Mark an address deprecated.
     *
     * @var bool
     */
    private $disabled;
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
     * @param int    $id       Identifier for this address.
     * @param string $name     Name of the person or company.
     * @param string $email    E-Mail address of the person or company.
     * @param bool   $disabled Check this if the address should be disabled.
     */
    public function __construct($id, $name, $email, $disabled)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->email    = $email;
        $this->disabled = $disabled;
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
    public function isDisabled()
    {
        return (bool) $this->disabled;
    }
}
