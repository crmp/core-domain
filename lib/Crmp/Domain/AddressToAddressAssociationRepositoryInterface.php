<?php

namespace Crmp\Domain;

/**
 * Interface for the address repository
 *
 * The address repository manages all addresses.
 *
 * @package Crmp
 */
interface AddressToAddressAssociationRepositoryInterface
{
    /**
     * Find associations for an address.
     *
     * @param int $id
     *
     * @return AddressToAddressAssociation[] Return associations between to addresses
     */
    public function find($id);

    /**
     * Search for similar associations.
     *
     * This uses the ::findAllSimilar method
     * and return the first match.
     *
     * @see ::findAllSimilar()
     *
     * @param AddressToAddressAssociation $association
     *
     * @return AddressToAddressAssociation[]
     */
    public function findSimilar(AddressToAddressAssociation $association);

    /**
     * Store or update an address.
     *
     * Addresses with an ID will be updated.
     * Those with no id will be created.
     *
     * @param AddressToAddressAssociation $association
     *
     * @return mixed
     *
     */
    public function persist(AddressToAddressAssociation $association);
}
