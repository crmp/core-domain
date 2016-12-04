<?php


namespace Crmp\Tests\UnitTests\Domain\Associations;


use Crmp\Domain\AddressToAddressAssociation;
use Crmp\Domain\Associations\AddressToAddress;
use Crmp\Tests\UnitTests\AbstractDomainTest;

class AddressToAddressTest extends AbstractDomainTest
{
    public function testDefaultTypeIsBothDirections()
    {
	    $association = new AddressToAddress(
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

	    $assoc = new AddressToAddress(
            uniqid(),
            $left,
            $right
        );

	    $this->assertEquals( $left, $assoc->getLeft() );
	    $this->assertEquals( $right, $assoc->getRight() );
    }

    public function testItHasATitle()
    {
        $title = uniqid();
	    $assoc = new AddressToAddress(
            $title,
            $this->getAddressStub(),
            $this->getAddressStub()
        );

        $this->assertEquals($title, $assoc->getTitle());
    }

    public function testTheTypeShowsTheDirectionOfInquiries()
    {
	    $assoc = new AddressToAddress(
            uniqid(),
            $this->getAddressStub(),
            $this->getAddressStub(),
		    AddressToAddress::LEFT_TO_RIGHT
        );

	    $this->assertEquals( AddressToAddress::LEFT_TO_RIGHT, $assoc->getType() );

	    $assoc = new AddressToAddress(
            uniqid(),
            $this->getAddressStub(),
            $this->getAddressStub(),
		    AddressToAddress::RIGHT_TO_LEFT
        );

	    $this->assertEquals( AddressToAddress::RIGHT_TO_LEFT, $assoc->getType() );

	    $assoc = new AddressToAddress(
            uniqid(),
            $this->getAddressStub(),
            $this->getAddressStub(),
		    AddressToAddress::NO_DIRECTION
        );

	    $this->assertEquals( AddressToAddress::NO_DIRECTION, $assoc->getType() );
    }
}
