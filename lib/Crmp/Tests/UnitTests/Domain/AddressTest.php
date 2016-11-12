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

    public function testItHasAnEmail()
    {
        $this->assertEquals($this->email, $this->createEntity()->getEmail());
    }

    public function testItHasAnId()
    {
        $this->assertEquals($this->id, $this->createEntity()->getId());
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
