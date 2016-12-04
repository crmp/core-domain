<?php


namespace Crmp\Tests\UnitTests\Domain;


use Crmp\Domain\Inquiry;
use Crmp\Tests\AddressTestDoubles;

class InquiryTest extends \PHPUnit_Framework_TestCase {

	use AddressTestDoubles;

	public function testAddressesCanBeSet() {
		$addresses = [ $this->createAddressStub(), $this->createAddressStub() ];
		$inquiry   = new Inquiry( $addresses );

		$this->assertEquals( $addresses, $inquiry->getAddresses() );
	}

	public function testItCanAppendAddresses() {
		$inquiry = new Inquiry();

		$address = $this->createAddressStub();

		$inquiry->appendAddress( $address );

		$this->assertEquals( [ $address ], $inquiry->getAddresses() );
	}
}
