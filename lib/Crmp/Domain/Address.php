<?php

namespace Crmp\Domain;

use Crmp\Domain\Traits\Associative;
use Ramsey\Uuid\Uuid;

/**
 * Address
 *
 * An address usually contains information about a person or a company.
 *
 * @package Crmp\Domain
 */
class Address implements SoftDeleteInterface
{
	use Associative;

    /**
     * Related addresses.
     *
     * @var AddressToAddressAssociation[]
     */
    protected $addressToAddressAssociations;
    /**
     * Mark an address deprecated.
     *
     * @var bool
     */
    protected $enabled;
    /**
     * Identifier
     *
     * @var int
     */
    protected $uuid;

    /**
     * Name
     *
     * @var string
     */
    protected $name;
	/**
	 * Child addresses.
	 *
	 * @var Address[]
	 */
	protected $subAddresses;
	/**
	 * @var Address
	 */
	protected $superordinateAddress;

    /**
     * Create new address.
     *
     * @param string       $name         Name of the person or company.
     * @param bool         $enabled      Check this if the address should be disabled (default: true/enabled).
     * @param Address|null $superAddress The superordinate address.
     */
    public function __construct($name, $enabled = true, $superAddress = null)
    {
        $this->name                 = $name;
        $this->enabled              = $enabled;
        $this->superordinateAddress = $superAddress;
    }

	/**
	 * @param Address $address
	 */
	public function addSubAddress( Address $address ) {
		$this->subAddresses[] = $address;
	}

    public function getUuid()
    {
        if ($this->uuid) {
            return $this->uuid;
        }

        return $this->uuid = Uuid::uuid4();
	}

    /**
     * Disable the entity.
     *
     * @return mixed
     */
    public function disable()
    {
        $this->enabled = false;
    }

    /**
     * Recover the entity.
     *
     * @return mixed
     */
    public function enable()
    {
        $this->enabled = true;
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
     * Receive child addresses.
     *
     * This will return all addresses that are summed up by this address.
     * An address can include several other addresses.
     * By doing this it wants to follow the principles that are given in every company.
     *
     * A company has a name (first address),
     * a CEO (simple sub address)
     * and some various sectors like marketing, production etc (each a sub address).
     * The "marketing" for instance is also an address with the name marketing
     * again containing plenty other addresses for each employee contact.
     *
     * Together with the related addresses the complexity of a whole company can be covered.
     *
     * @return Address[]
     */
    public function getSubAddresses()
    {
        return $this->subAddresses;
    }

    /**
     * Get parent address.
     *
     * As addresses can have a sub address it shall also be possible to move back up the tree.
     * So when a customer is found in the system then it needs to know which one is his "parent".
     * This could be the sector, factory or shop he works in.
     *
     * @return Address|null The parent address or null if it has none.
     */
    public function getSuperordinateAddress()
    {
        return $this->superordinateAddress;
    }

    /**
     * Check if disabled.
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return (bool) $this->enabled;
    }
}
