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
     * @param string $uuid
     *
     * @return Address|null Returns the address or null if not found.
     */
    public function find($uuid);

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
