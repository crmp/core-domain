<?php

namespace Crmp\Commands;

use Crmp\Domain\Address;
use Crmp\Domain\AddressRepositoryInterface;

/**
 * Disable an address.
 *
 * @package Crmp\Commands
 */
class SoftDeleteHandler
{
    /**
     * @var AddressRepositoryInterface
     */
    protected $addressRepository;

    /**
     * Register handler.
     *
     * @param AddressRepositoryInterface $addressRepository The repository to use for interaction with the database.
     */
    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * Handle all disable address commands.
     *
     * @param SoftDeleteCommand $disableAddressCommand
     */
    public function handle(SoftDeleteCommand $disableAddressCommand)
    {
        $address = $disableAddressCommand->getEntity();

        if ($address->isEnabled()) {
            // already disabled => nothing to do
            return;
        }

        $disabledAddress = new Address(
            $address->getId(),
            $address->getName(),
            $address->getEmail(),
            true
        );

        $this->addressRepository->persist($disabledAddress);
    }
}
