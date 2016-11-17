<?php

namespace Crmp\Tests\UnitTests\Domain;

use Crmp\Domain\Address;

trait AddressTestTrait {
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
