<?php

namespace Crmp\Domain;

interface InquiryRepositoryInterface {
	/**
	 * Bind address to inquiry.
	 *
	 * @param Inquiry $inquiry
	 * @param Address $address
	 */
	public function bindAddress( Inquiry $inquiry, Address $address );

	/**
	 * Get ancestor in ascending order.
	 *
	 * @param Inquiry $inquiry
	 *
	 * @return Inquiry[]
	 */
	public function findAncestor( Inquiry $inquiry );

	/**
	 * Find all inquiries done by an contract.
	 *
	 * @param Contract $contract
	 *
	 * @return Inquiry[]
	 */
	public function findByContract( Contract $contract );

	/**
	 * Fetch direct children of an inquiry.
	 *
	 * @param Inquiry $inquiry
	 *
	 * @return Inquiry[]
	 */
	public function findChildren( Inquiry $inquiry );

	/**
	 * Get all underlying inquiries.
	 *
	 * @param Inquiry $inquiry
	 *
	 * @return Inquiry[]
	 */
	public function findDescendant( Inquiry $inquiry );

	/**
	 * Fetch all upcoming siblings.
	 *
	 * @param Inquiry $inquiry
	 *
	 * @return Inquiry[]
	 */
	public function findFollowingSibling( Inquiry $inquiry );

	/**
	 * Fetch parent of inquiry.
	 *
	 * @param Inquiry $inquiry
	 *
	 * @return Inquiry
	 */
	public function findParent( Inquiry $inquiry );

	/**
	 * Fetch all previous siblings.
	 *
	 * @param Inquiry $inquiry
	 *
	 * @return Inquiry[]
	 */
	public function findPrecedingSibling( Inquiry $inquiry );
}
