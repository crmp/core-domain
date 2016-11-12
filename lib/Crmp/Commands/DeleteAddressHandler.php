<?php

namespace Crmp\Commands;

use Crmp\Domain\AddressRepositoryInterface;

/**
 * Disable an address.
 *
 * @package Crmp\Commands
 */
class DeleteAddressHandler
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
     * @param DeleteAddressCommand $disableAddressCommand
     */
    public function handle(DeleteAddressCommand $disableAddressCommand)
    {
        $address = $disableAddressCommand->getEntity();

        if (!$address->isEnabled()) {
            // already disabled => nothing to do
            return;
        }

        $address->disable();

        $this->addressRepository->persist($address);
    }
}
