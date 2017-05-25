<?php

namespace Crmp\Tests\UnitTests\Domain;

use Crmp\Domain\Address;

trait AddressTestTrait {
    protected function getAddressStub($superAddress = null)
    {
        return new Address(
            uniqid('name', true),
            (bool) mt_rand(0, 1),
            $superAddress
        );
    }
}
