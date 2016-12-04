<?php


namespace Crmp\Tests\UnitTests\Domain;


use Crmp\Domain\Inquiry;
use Crmp\Tests\AddressTestDoubles;

class InquiryTest extends \PHPUnit_Framework_TestCase {

	use AddressTestDoubles;

	private function createInquiryStub() {
		return new Inquiry( 'subject', 'description', [], null );
	}

	public function testAddressesCanBeSet() {
		$addresses = [ $this->createAddressStub(), $this->createAddressStub() ];
		$inquiry   = new Inquiry( 'subject', 'content', $addresses );

		$this->assertEquals( $addresses, $inquiry->getAddresses() );
	}

	public function testItCanAppendAddresses() {
		$inquiry = new Inquiry( 'subject', 'content' );

		$address = $this->createAddressStub();

		$inquiry->appendAddress( $address );

		$this->assertEquals( [ $address ], $inquiry->getAddresses() );
	}

	public function testItCanHaveAParent() {
		$superordinate = $this->createInquiryStub();
		$inquiry       = new Inquiry( 'title', 'Content', [], $superordinate );

		$this->assertEquals( $superordinate, $inquiry->getSuperordinate() );
	}

	public function testItHasAContent() {
		$content = uniqid();

		$inquiry = new Inquiry( 'subject', $content );

		$this->assertEquals( $content, $inquiry->getContent() );
	}

	public function testItHasATitle() {
		$title   = uniqid();
		$inquiry = new Inquiry( $title, 'content' );

		$this->assertEquals( $title, $inquiry->getTitle() );
	}

	public function testItHasChildren() {
		$inquiry = $this->createInquiryStub();

		$inquiry->append( $child = $this->createInquiryStub() );

		$this->assertEquals( [ $child ], $inquiry->getChildren() );
	}
}
