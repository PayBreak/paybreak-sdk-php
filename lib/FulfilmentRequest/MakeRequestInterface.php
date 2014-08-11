<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\FulfilmentRequest;

use Graham\FulfilmentRequest\Repository\FulfilmentRequestRepositoryInterface;
use Graham\StandardInterface\ConfigurationInterface;
use Graham\LoanRequest\Repository\LoanRequestRepositoryInterface;
use Graham\LoanRequest\Entity\LoanRequestInterface;

interface MakeRequestInterface
{
    /**
     * @param ConfigurationInterface               $configuration
     * @param LoanRequestRepositoryInterface       $loanRequestRepository
     * @param FulfilmentRequestRepositoryInterface $fulfilmentRequestRepository
     */
    public function __construct(
        ConfigurationInterface $configuration,
        LoanRequestRepositoryInterface $loanRequestRepository,
        FulfilmentRequestRepositoryInterface $fulfilmentRequestRepository
    );

    /**
     * Set Loan Request to fulfill
     *
     * @param  \Graham\LoanRequest\Entity\LoanRequestInterface $loanRequest
     * @return bool
     */
    public function setLoanRequest(LoanRequestInterface $loanRequest);

    /**
     * Prepare Fulfilment Request
     *
     * @throws \Exception
     * @return array
     */
    public function prepareRequest();
}
