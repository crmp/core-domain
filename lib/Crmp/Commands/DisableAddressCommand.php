<?php

namespace Crmp\Commands;

use Crmp\Domain\Address;

/**
 * Command to disable an address.
 *
 * @package Crmp\Commands
 */
class DisableAddressCommand
{
    /**
     * Address to disable.
     *
     * @var Address
     */
    protected $address;

    /**
     * New command to disable an address.
     *
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
