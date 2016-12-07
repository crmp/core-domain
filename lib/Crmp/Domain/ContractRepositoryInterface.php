<?php

namespace Crmp\Domain;

interface ContractRepositoryInterface {
	/**
	 * Find the contract that relates to an inquiry.
	 *
	 * An inquiry can be turned directly into a contract.
	 * Therefor a search method is necessary.
	 *
	 * @param Inquiry $inquiry
	 *
	 * @return Contract
	 */
	public function findByInquiry( Inquiry $inquiry );
}
