<?php

namespace Crmp\Commands\Address;

use Crmp\Domain\AddressToAddressAssociation;
use Crmp\Domain\AddressToAddressAssociationRepositoryInterface;

/**
 * Handle new associations
 *
 * @package Crmp\Commands\Address
 */
class SetAssociationHandler
{
    protected $addressAssociationRepository;

    /**
     * Create new handler.
     *
     * @param AddressToAddressAssociationRepositoryInterface $addressAssociationRepository
     */
    public function __construct(AddressToAddressAssociationRepositoryInterface $addressAssociationRepository)
    {
        $this->addressAssociationRepository = $addressAssociationRepository;
    }

    /**
     * Do set a new association.
     *
     * @param SetAssociationCommand $command
     */
    public function handle(SetAssociationCommand $command)
    {
        $association = new AddressToAddressAssociation(
            $command->title,
            $command->left,
            $command->right,
            $command->assocType
        );

        $this->addressAssociationRepository->persist($association);
    }
}
