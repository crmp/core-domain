<?php

namespace Crmp\Tests\UnitTests\Domain;

use Crmp\Domain\Address;
use Crmp\Domain\AddressToAddressAssociation;
use Crmp\Domain\Associations\AddressToAddress;
use Crmp\Tests\UnitTests\AbstractDomainTest;
use Faker\Factory;

class AddressTest extends AbstractDomainTest
{
    protected $email;

    protected $enabled;

    protected $id;

    protected $name;

	/**
	 * @return Address
	 */
	protected function createEntity() {
		return new Address( $this->name, $this->enabled );
	}

	protected function setUp() {
		parent::setUp();

		$faker = Factory::create();

		$this->name    = $faker->firstName . ' ' . $faker->lastName;
	}

    public function testItCanBeDisabled()
    {
        $address = $this->createEntity();

        $this->assertEquals($this->enabled, $address->isEnabled());

        $address->disable();

        $this->assertEquals(false, $address->isEnabled());
    }

    public function testItCanBeEnabled()
    {
        $address = new Address('name', false);

        $this->assertFalse($address->isEnabled());

        $address->enable();

        $this->assertTrue($address->isEnabled());
    }

    public function testItHasAName()
    {
        $address = $this->createEntity();

        $this->assertEquals($this->name, $address->getName());
    }

    public function testItHasASubAddress()
    {
        $address = new Address('name', true);

        $someOther  = new Address('other', false);
        $andAnother = new Address('bar', true);

        $address->addSubAddress($someOther);
        $address->addSubAddress($andAnother);

        $this->assertEquals(
            [
                $someOther,
                $andAnother,
            ],
            $address->getSubAddresses()
        );
    }

    public function testItHasASuperAddress()
    {
        $super = new Address('doctor', false);
        $adr   = new Address('who', true, $super);

        $this->assertEquals($super, $adr->getSuperordinateAddress());
    }

    public function testItHasAnUuid()
    {
        $this->assertNotNull($this->createEntity()->getUuid());
    }

    public function testItHasRelatedAddresses()
    {
        $address = new Address('name', true);

	    $association = new AddressToAddress(
            'foo',
            $this->getAddressStub(),
            $this->getAddressStub()
        );

        $address->addAssociation($association);

        $this->assertEquals(
            [
                $association,
            ],
            $address->getAssociations()
        );
    }
}
