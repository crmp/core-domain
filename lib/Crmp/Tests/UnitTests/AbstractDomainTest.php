<?php

namespace Crmp\Tests\UnitTests;

use Crmp\Domain\Address;

abstract class AbstractDomainTest extends \PHPUnit_Framework_TestCase
{
    protected function getAddressStub($superAddress = null)
    {
        return new Address(
            uniqid('name', true),
            (bool) mt_rand(0, 1),
            $superAddress
        );
    }
}
