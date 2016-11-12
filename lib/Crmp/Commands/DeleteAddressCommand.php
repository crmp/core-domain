<?php

namespace Crmp\Commands;

use Crmp\Domain\SoftDeleteInterface;

/**
 * Command to disable an address.
 *
 * @package Crmp\Commands
 */
class DeleteAddressCommand
{
    /**
     * Address to disable.
     *
     * @var SoftDeleteInterface
     */
    protected $entity;

    /**
     * New command to disable an address.
     *
     * @param SoftDeleteInterface $entity
     */
    public function __construct(SoftDeleteInterface $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return SoftDeleteInterface
     */
    public function getEntity()
    {
        return $this->entity;
    }
}
