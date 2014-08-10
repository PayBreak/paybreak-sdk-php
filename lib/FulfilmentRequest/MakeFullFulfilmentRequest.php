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

use Graham\FulfilmentRequest\Entity\FullFulfilmentRequest;
use Graham\HashGenerator;
use Graham\LoanRequest\Entity\LoanRequestInterface;
use Graham\LoanRequest\Repository\LoanRequestRepositoryInterface;
use Graham\StandardInterface\ConfigurationInterface;

class MakeFullFulfilmentRequest
{
    protected $configuration;
    protected $loanRequestRepository;
    protected $loanRequest;
    protected $fulfilmentRequest;

    public function __construct(
        ConfigurationInterface $configuration,
        LoanRequestRepositoryInterface $loanRequestRepository
    )
    {
        $this->configuration = $configuration;
        $this->loanRequestRepository = $loanRequestRepository;
        $this->fulfilmentRequest = new FullFulfilmentRequest();
    }

    /**
     * Get Loan Request to fulfill from Repository
     *
     * @param $id
     * @return \Graham\LoanRequest\Entity\LoanRequestInterface|bool
     */
    public function getLoanRequest($id)
    {
        if ($this->loanRequest = $this->loanRequestRepository->findById($id)) {

            $this->setLoanRequest($this->loanRequest);

            return $this->loanRequest;
        }

        return false;
    }

    /**
     * Set Loan Request to fulfill
     *
     * @param  \Graham\LoanRequest\Entity\LoanRequestInterface $loanRequest
     * @return bool
     */
    public function setLoanRequest(LoanRequestInterface $loanRequest)
    {
        $this->fulfilmentRequest->setCheckoutVersion($loanRequest->getCheckoutVersion());
        $this->fulfilmentRequest->setCheckoutType($loanRequest->getCheckoutType());
        $this->fulfilmentRequest->setMerchantInstallation($loanRequest->getMerchantInstallation());
        $this->fulfilmentRequest->setOrderReference($loanRequest->getOrderReference());
        $this->fulfilmentRequest->setOrderAmount($loanRequest->getOrderAmount());

        return true;
    }

    /**
     * Prepare Fulfilment Request
     *
     * @throws \Exception
     * @return array
     */
    public function prepareRequest()
    {
        if (
            !$this->fulfilmentRequest->getCheckoutType() ||
            !$this->fulfilmentRequest->getCheckoutVersion() ||
            !$this->fulfilmentRequest->getMerchantInstallation() ||
            !$this->fulfilmentRequest->getOrderReference() ||
            !$this->fulfilmentRequest->getOrderAmount()
        ){
            throw new \Exception('Unable to prepare fulfilment, not enough data provided.');
        }

        $ar = [];

        $ar['checkout_version'] = $this->fulfilmentRequest->getCheckoutVersion();
        $ar['checkout_type'] = $this->fulfilmentRequest->getCheckoutType();
        $ar['merchant_installation'] = $this->fulfilmentRequest->getMerchantInstallation();
        $ar['order_reference'] = $this->fulfilmentRequest->getOrderReference();
        $ar['order_amount'] = $this->fulfilmentRequest->getOrderAmount();

        $ar['merchant_hash'] = HashGenerator::genHash($ar, $this->configuration->getKey());

        return $ar;
    }
}
