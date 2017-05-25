<?php

namespace Crmp\Tests\UnitTests;

use Crmp\Domain\Address;
use Ramsey\Uuid\Uuid;

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

    protected static function assertNamespace($expectedPath, $current)
    {
        $expected = Uuid::NIL;
        foreach ($expectedPath as $item) {
            $expected = Uuid::uuid5($expected, $item)->toString();
        }

        static::assertEquals($expected, $current);
    }
}
