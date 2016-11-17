<?php


namespace Crmp\Tests\UnitTests\Domain;


use Crmp\Domain\Address;
use Crmp\Domain\AddressToAddressAssociation;

class AddressToAddressAssociationTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultTypeIsBothDirections()
    {
        $association = new AddressToAddressAssociation(
            uniqid(),
            $this->getAddressStub(),
            $this->getAddressStub()
        );

        $this->assertEquals($association::BOTH_DIRECTIONS, $association->getType());
    }

    public function testItContainsTwoAddresses()
    {
        $left  = $this->getAddressStub();
        $right = $this->getAddressStub();

        $assoc = new AddressToAddressAssociation(
            uniqid(),
            $left,
            $right
        );

        $this->assertEquals($left, $assoc->getLeftAddress());
        $this->assertEquals($right, $assoc->getRightAddress());
    }

    public function testItHasATitle()
    {
        $title = uniqid();
        $assoc = new AddressToAddressAssociation(
            $title,
            $this->getAddressStub(),
            $this->getAddressStub()
        );

        $this->assertEquals($title, $assoc->getTitle());
    }

    public function testTheTypeShowsTheDirectionOfInquiries()
    {
        $assoc = new AddressToAddressAssociation(
            uniqid(),
            $this->getAddressStub(),
            $this->getAddressStub(),
            AddressToAddressAssociation::LEFT_TO_RIGHT
        );

        $this->assertEquals(AddressToAddressAssociation::LEFT_TO_RIGHT, $assoc->getType());

        $assoc = new AddressToAddressAssociation(
            uniqid(),
            $this->getAddressStub(),
            $this->getAddressStub(),
            AddressToAddressAssociation::RIGHT_TO_LEFT
        );

        $this->assertEquals(AddressToAddressAssociation::RIGHT_TO_LEFT, $assoc->getType());

        $assoc = new AddressToAddressAssociation(
            uniqid(),
            $this->getAddressStub(),
            $this->getAddressStub(),
            AddressToAddressAssociation::NO_DIRECTION
        );

        $this->assertEquals(AddressToAddressAssociation::NO_DIRECTION, $assoc->getType());
    }

    protected function getAddressStub($superAddress = null)
    {
        return new Address(
            mt_rand(42, 1337),
            uniqid(),
            uniqid('email').'@'.uniqid().'.foo',
            (bool) mt_rand(0, 1),
            $superAddress
        );
    }
}
