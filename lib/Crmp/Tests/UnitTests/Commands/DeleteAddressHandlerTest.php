<?php


namespace Crmp\Tests\UnitTests\Commands;

use Crmp\Commands\DeleteAddressCommand;
use Crmp\Commands\DeleteAddressHandler;
use Crmp\Domain\Address;
use Crmp\Domain\AddressRepositoryInterface;

/**
 * SoftDeleteHandlerTest
 *
 * @see     DeleteAddressHandler
 *
 * @package Crmp\Tests\UnitTests\Commands
 */
class DeleteAddressHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testAlreadyDisabledAddressesWillBeIgnored()
    {
        $address = new Address(1, uniqid(), uniqid(), false);

        $command = new DeleteAddressCommand($address);

        $repoMock = $this->getMockBuilder(AddressRepositoryInterface::class)
                         ->setMethods(['persist'])
                         ->getMockForAbstractClass();

        // This should never be called when address is already hidden
        $repoMock->expects($this->never())
                 ->method('persist');

        $handler = new DeleteAddressHandler($repoMock);

        $handler->handle($command);
    }

    public function testItDisablesAndPersistViaRepository()
    {
        $address = new Address(1, uniqid(), uniqid(), false);
        $disabledAddress = clone $address;
        $disabledAddress->disable();

        $command = new DeleteAddressCommand($address);

        $repoMock = $this->getMockBuilder(AddressRepositoryInterface::class)
                         ->setMethods(['persist'])
                         ->getMockForAbstractClass();
        
        $repoMock->expects($this->never())
                 ->method('persist')
                 ->with($disabledAddress);

        $handler = new DeleteAddressHandler($repoMock);

        $handler->handle($command);
    }
}
