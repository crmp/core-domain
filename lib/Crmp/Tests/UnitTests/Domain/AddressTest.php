<?php

namespace Crmp\Tests\UnitTests\Domain;

use Crmp\Domain\Address;
use Faker\Factory;

class AddressTest extends \PHPUnit_Framework_TestCase
{
    protected $email;

    protected $enabled;

    protected $id;

    protected $name;

    public function testItCanBeDisabled()
    {
        $address = $this->createEntity();

        $this->assertEquals($this->enabled, $address->isEnabled());

        $address->disable();

        $this->assertEquals(false, $address->isEnabled());
    }

    public function testItCanBeEnabled()
    {
        $address = new Address(1, 'name', 'mail', false);

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
        $address = new Address(123, 'name', 'email', true);

        $someOther  = new Address(456, 'other', 'foo', false);
        $andAnother = new Address(567, 'bar', 'baz', true);

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
        $super = new Address(1337, 'time', 'money', false);
        $adr   = new Address(42, 'who', 'what', true, $super);

        $this->assertEquals($super, $adr->getSuperordinateAddress());
    }

    public function testItHasAnEmail()
    {
        $this->assertEquals($this->email, $this->createEntity()->getEmail());
    }

    public function testItHasAnId()
    {
        $this->assertEquals($this->id, $this->createEntity()->getId());
    }

    public function testItHasRelatedAddresses()
    {
        $address = new Address(123, 'name', 'email', true);

        $someOther  = new Address(456, 'other', 'foo', false);
        $andAnother = new Address(567, 'bar', 'baz', true);

        $address->addRelatedAddress($someOther);
        $address->addRelatedAddress($andAnother);

        $this->assertEquals(
            [
                $someOther,
                $andAnother,
            ],
            $address->getRelatedAddresses()
        );
    }

    public function testTheSuperAddressIsNullForRootNodes()
    {
        $address = new Address(0x815, 'superduper', 'some@e.mail', true);

        $this->assertNull($address->getSuperordinateAddress());
    }

    /**
     * @return Address
     */
    protected function createEntity()
    {
        return new Address($this->id, $this->name, $this->email, $this->enabled);
    }

    protected function setUp()
    {
        parent::setUp();

        $faker = Factory::create();

        $this->id      = mt_rand(42, 1337);
        $this->name    = $faker->firstName.' '.$faker->lastName;
        $this->email   = $faker->email;
        $this->enabled = true;
    }
}
