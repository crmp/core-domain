<?php

namespace Crmp\Tests\UnitTests\Commands;

use Crmp\Commands\DisableAddressCommand;
use Crmp\Domain\Address;

/**
 * DisableAddressCommandTest
 *
 * @see     DisableAddressCommand
 *
 * @package Crmp\Tests\UnitTests\Commands
 */
class DisableAddressCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testItContainsAnAddress()
    {
        $address = new Address(1, uniqid(), uniqid(), false);
        $command = new DisableAddressCommand($address);

        $this->assertEquals($address, $command->getAddress());
    }
}
