<?php


namespace Crmp\Tests\UnitTests\Commands\Address;


use Crmp\Commands\Address\SetAssociationCommand;
use Crmp\Domain\AddressToAddressAssociation;
use Crmp\Tests\UnitTests\Domain\AddressTestTrait;

class SetAssociationCommandTest extends \PHPUnit_Framework_TestCase
{
    use AddressTestTrait;

    public function testItTransportsATitle()
    {
        $title   = uniqid();
        $command = new SetAssociationCommand(
            $title,
            $this->getAddressStub(),
            $this->getAddressStub()
        );

        $this->assertEquals($title, $command->title);
    }

    public function testItTransportsTheLeftAddress()
    {
        $left    = $this->getAddressStub();
        $command = new SetAssociationCommand(
            uniqid(),
            $left,
            $this->getAddressStub()
        );

        $this->assertEquals($left, $command->left);
    }

    public function testItTransportsTheRightAddress()
    {
        $right   = $this->getAddressStub();
        $command = new SetAssociationCommand(
            uniqid(),
            $this->getAddressStub(),
            $right
        );

        $this->assertEquals($right, $command->right);
    }

    public function testItTransportsTheType()
    {
        $command = new SetAssociationCommand(
            uniqid(),
            $this->getAddressStub(),
            $this->getAddressStub(),
            AddressToAddressAssociation::LEFT_TO_RIGHT
        );

        $this->assertEquals(AddressToAddressAssociation::LEFT_TO_RIGHT, $command->assocType);
    }
}
