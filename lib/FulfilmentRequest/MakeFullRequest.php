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

use PayBreak\Sdk\FulfilmentRequest\Entity\FullFulfilmentRequest;
use PayBreak\Sdk\FulfilmentRequest\Repository\FulfilmentRequestRepositoryInterface;
use PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface;
use PayBreak\Sdk\LoanRequest\Repository\LoanRequestRepositoryInterface;
use PayBreak\Sdk\StandardInterface\ConfigurationInterface;

/**
 * Class MakeFullRequest
 *
 * @author WN
 * @package PayBreak\Sdk\FulfilmentRequest
 */
class MakeFullRequest extends MakeRequestAbstract
{
    public function __construct(
        ConfigurationInterface $configuration,
        LoanRequestRepositoryInterface $loanRequestRepository,
        FulfilmentRequestRepositoryInterface $fulfilmentRequestRepository
    )
    {
        parent::__construct($configuration, $loanRequestRepository, $fulfilmentRequestRepository);
        $this->fulfilmentRequest = new FullFulfilmentRequest();
    }

    /**
     * Prepare Fulfilment Request
     *
     * @throws \Exception
     * @return array
     */
    public function prepareRequest()
    {
        $ar = [];

        $this->prepareEssentialRequest($ar);

        $this->addMerchantHash($ar);

        return $ar;
    }

    /**
     * Confirm Sent
     *
     * Should be run once FulfilmentRequest is successfully sent and accepted. Updates FulfilmentRequest and LoanRequest.
     *
     * @return bool
     */
    public function confirmSent()
    {
        $this->loanRequest->setFulfilled(LoanRequestInterface::FULFILLED_FULL);

        parent::confirmSent();
    }
}
