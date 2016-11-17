<?php

namespace Crmp\Tests\UnitTests;

use Crmp\Domain\Address;

abstract class AbstractDomainTest extends \PHPUnit_Framework_TestCase
{
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
