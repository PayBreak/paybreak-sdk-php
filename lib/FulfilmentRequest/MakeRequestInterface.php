<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\FulfilmentRequest;

use PayBreak\Sdk\FulfilmentRequest\Repository\FulfilmentRequestRepositoryInterface;
use PayBreak\Sdk\StandardInterface\ConfigurationInterface;
use PayBreak\Sdk\LoanRequest\Repository\LoanRequestRepositoryInterface;
use PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface;

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
     * @param  \PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface $loanRequest
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

    /**
     * Confirm Sent
     *
     * Should be run once FulfilmentRequest is successfully sent and accepted. Updates FulfilmentRequest and LoanRequest.
     *
     * @return bool
     */
    public function confirmSent();

    /**
     * Save Fulfilment Request
     *
     * Also saves Loan Request
     *
     * @return bool
     */
    public function save();
}
