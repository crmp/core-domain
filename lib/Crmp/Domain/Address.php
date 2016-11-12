<?php

namespace Crmp\Domain;

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
        return (bool)$this->disabled;
    }
}