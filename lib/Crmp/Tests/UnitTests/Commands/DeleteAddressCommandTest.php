<?php

namespace Crmp\Tests\UnitTests\Commands;

use Crmp\Commands\DeleteAddressCommand;
use Crmp\Domain\Address;

/**
 * DisableAddressCommandTest
 *
 * @see     DisableAddressCommand
 *
 * @package Crmp\Tests\UnitTests\Commands
 */
class DeleteAddressCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testItContainsAnAddress()
    {
        $address = new Address(1, uniqid(), uniqid(), true);
        $command = new DeleteAddressCommand($address);

        $this->assertEquals($address, $command->getEntity());
    }
}
