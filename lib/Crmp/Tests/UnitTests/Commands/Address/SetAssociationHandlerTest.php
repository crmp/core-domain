<?php


namespace Crmp\Tests\UnitTests\Commands\Address;


use Crmp\Commands\Address\SetAssociationCommand;
use Crmp\Commands\Address\SetAssociationHandler;
use Crmp\Domain\AddressToAddressAssociation;
use Crmp\Domain\AddressToAddressAssociationRepositoryInterface;
use Crmp\Tests\UnitTests\Domain\AddressTestTrait;

class SetAssociationHandlerTest extends \PHPUnit_Framework_TestCase
{
    use AddressTestTrait;

    public function testItPersistsAnAssociationObject()
    {
        $title           = uniqid();
        $leftAddress     = $this->getAddressStub();
        $rightAddress    = $this->getAddressStub();
        $associationType = 42;
        $expectedObject  = new AddressToAddressAssociation(
            $title,
            $leftAddress,
            $rightAddress,
            $associationType
        );

        $repoMock = $this->getMockBuilder(AddressToAddressAssociationRepositoryInterface::class)
                         ->setMethods(['persist'])
                         ->getMockForAbstractClass();

        $repoMock->expects($this->once())
                 ->method('persist')
                 ->with($expectedObject);

        $handler = new SetAssociationHandler($repoMock);

        $handler->handle(
            new SetAssociationCommand($title, $leftAddress, $rightAddress, $associationType)
        );
    }
}
