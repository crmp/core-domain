<?php

namespace Crmp\Domain;

/**
 * Interface for the address repository
 *
 * The address repository manages all addresses.
 *
 * @package Crmp
 */
interface AddressRepositoryInterface
{
    /**
     * Find an address by identifier.
     *
     * @param int $id
     *
     * @return Address|null Returns the address or null if not found.
     */
    public function find($id);

    /**
     * Search for similar addresses.
     *
     * @param Address $address
     *
     * @return Address[]
     */
    public function findAllSimilar(Address $address);

    /**
     * Search for one similar address.
     *
     * This uses the ::findAllSimilar method
     * and return the first match.
     *
     * @see ::findAllSimilar()
     *
     * @param Address $address
     *
     * @return mixed
     */
    public function findSimilar(Address $address);

    /**
     * Store or update an address.
     *
     * Addresses with an ID will be updated.
     * Those with no id will be created.
     *
     * @param Address $address
     *
     * @return mixed
     */
    public function persist(Address $address);
}
