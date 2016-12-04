<?php

namespace Crmp\Tests;

use Crmp\Domain\Address;

trait AddressTestDoubles {
	public function createAddressStub() {
		return new Address( mt_rand( 42, 1337 ), uniqid( 'name ' ), uniqid( 'a' ) . '@example.org', true );
	}
}
