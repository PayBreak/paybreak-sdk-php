<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\FulfilmentRequest;

use PayBreak\Sdk\FulfilmentRequest\Entity\FulfilmentRequestInterface;
use PayBreak\Sdk\FulfilmentRequest\Repository\FulfilmentRequestRepositoryInterface;
use PayBreak\Sdk\StandardInterface\ConfigurationInterface;
use PayBreak\Sdk\LoanRequest\Repository\LoanRequestRepositoryInterface;
use PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface;
use PayBreak\Sdk\HashGenerator;

/**
 * Class MakeRequestAbstract
 *
 * @author WN
 * @package PayBreak\Sdk\FulfilmentRequest
 */
abstract class MakeRequestAbstract implements MakeRequestInterface
{
    protected $configuration;
    protected $loanRequestRepository;
    /**
     * @var \PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface
     */
    protected $loanRequest;
    protected $fulfilmentRequestRepository;
    /**
     * @var \PayBreak\Sdk\FulfilmentRequest\Entity\FulfilmentRequestInterface
     */
    protected $fulfilmentRequest;

    public function __construct(
        ConfigurationInterface $configuration,
        LoanRequestRepositoryInterface $loanRequestRepository,
        FulfilmentRequestRepositoryInterface $fulfilmentRequestRepository
    )
    {
        $this->configuration = $configuration;
        $this->loanRequestRepository = $loanRequestRepository;
        $this->fulfilmentRequestRepository = $fulfilmentRequestRepository;
    }

    /**
     * Get Loan Request to fulfill from Repository
     *
     * @param $id
     * @return \PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface|bool
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
     * @param  \PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface $loanRequest
     * @return bool
     */
    public function setLoanRequest(LoanRequestInterface $loanRequest)
    {
        $this->fulfilmentRequest->setCheckoutVersion($loanRequest->getCheckoutVersion());

        // this won't work - there is no checkout type in the Loan Request object since 3.3+.
//        $this->fulfilmentRequest->setCheckoutType($loanRequest->getCheckoutType());

        $this->fulfilmentRequest->setCheckoutType(2); // set to 2 - request will always be Extended

        $this->fulfilmentRequest->setMerchantInstallation($loanRequest->getMerchantInstallation());
        $this->fulfilmentRequest->setOrderReference($loanRequest->getOrderReference());
        $this->fulfilmentRequest->setOrderAmount($loanRequest->getOrderAmount());

        return true;
    }

    /**
     * @param  array      $ar
     * @return bool
     * @throws \Exception
     */
    protected function prepareEssentialRequest(array &$ar)
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

        return true;
    }

    /**
     * @param  array $ar
     * @return bool
     */
    protected function addMerchantHash(array &$ar)
    {
        $ar['merchant_hash'] = HashGenerator::genHash($ar, $this->configuration->getKey(), $this->configuration->getHashMethod());

        return true;
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
        $this->fulfilmentRequest->setStatus(FulfilmentRequestInterface::STATUS_REQUESTED);

        return $this->save();
    }

    /**
     * Save Fulfilment Request
     *
     * Also saves Loan Request
     *
     * @return bool
     */
    public function save()
    {
        if (
            $this->fulfilmentRequestRepository->save($this->fulfilmentRequest) &&
            $this->loanRequestRepository->save($this->loanRequest)
        ){
            return true;
        }

        return false;
    }
}
