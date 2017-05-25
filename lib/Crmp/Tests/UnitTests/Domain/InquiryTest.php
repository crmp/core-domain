<?php


namespace Crmp\Tests\UnitTests\Domain;


use Crmp\Domain\Inquiry;
use Crmp\Tests\AddressTestDoubles;

class InquiryTest extends \PHPUnit_Framework_TestCase {

	use AddressTestDoubles;

	private function createInquiryStub() {
		return new Inquiry( 'subject', 'description', [], null );
	}

	public function testHasAContent() {
		$content = uniqid('content', true);

		$inquiry = new Inquiry( 'subject', $content );

		$this->assertEquals( $content, $inquiry->getContent() );
	}

	public function testHasATitle() {
		$title   = uniqid('title', true);
		$inquiry = new Inquiry( $title, 'content' );

		$this->assertEquals( $title, $inquiry->getTitle() );
	}
}
