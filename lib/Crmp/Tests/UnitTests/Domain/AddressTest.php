<?php

namespace Crmp\Tests\UnitTests\Domain;

use Crmp\Domain\Address;
use Faker\Factory;

class AddressTest extends \PHPUnit_Framework_TestCase
{
    protected $disabled;
    protected $email;
    protected $id;
    protected $name;

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

    public function testItCanBeDisabled()
    {
        $this->assertEquals($this->disabled, $this->createEntity()->isDisabled());
    }

    /**
     * @return Address
     */
    protected function createEntity()
    {
        return new Address($this->id, $this->name, $this->email, $this->disabled);
    }

    protected function setUp()
    {
        parent::setUp();

        $faker = Factory::create();

        $this->id       = mt_rand(42, 1337);
        $this->name     = $faker->firstName.' '.$faker->lastName;
        $this->email    = $faker->email;
        $this->disabled = true;
    }
}
