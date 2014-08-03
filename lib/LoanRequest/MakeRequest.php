<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\LoanRequest;

use Graham\CustomType;
use Graham\FieldEncoder;
use Graham\HashGenerator;
use Graham\StandardInterface\ConfigurationInterface;

/**
 * Class MakeRequest
 *
 * @package Graham\LoanRequest
 */
class MakeRequest
{
    protected $loanRequest;
    protected $configuration;
    protected $additionalData;

    /**
     * @throws \InvalidArgumentException
     * @param  int                       $type
     * @param  ConfigurationInterface    $configuration
     */
    public function __construct($type, ConfigurationInterface $configuration)
    {
        $this->configuration = $configuration;

        if ($type == 1) {
            $this->loanRequest = new Entity\SimpleLoanRequest();
        } elseif ($type == 2) {
            $this->loanRequest = new Entity\ExtendedLoanRequest();
        } else {
            throw new \InvalidArgumentException('Invalid Checkout Type');
        }

        $this->loanRequest->setMerchantInstallation($configuration->getMerchantInstallation());

        $this->loanRequest->setCheckoutVersion($configuration->getCheckoutVersion());
    }

    /**
     * Make Simple Loan Request
     *
     * @param  ConfigurationInterface $configuration
     * @return static
     */
    public static function makeSimple(ConfigurationInterface $configuration)
    {
        return new static(Entity\LoanRequestInterface::TYPE_SIMPLE, $configuration);
    }

    /**
     * Make Extended Loan Request
     *
     * @param  ConfigurationInterface $configuration
     * @return static
     */
    public static function makeExtended(ConfigurationInterface $configuration)
    {
        return new static(Entity\LoanRequestInterface::TYPE_EXTENDED, $configuration);
    }

    /**
     * Set Amount
     *
     * @param  int $amount
     * @return int
     */
    public function setAmount($amount)
    {
        return $this->loanRequest->setOrderAmount($amount);
    }

    /**
     * Set Reference
     * @param $reference
     * @return string
     */
    public function setReference($reference)
    {
        return $this->loanRequest->setOrderReference($reference);
    }

    /**
     * Set Description
     *
     * @param $description
     * @return string
     */
    public function setDescription($description)
    {
        return $this->loanRequest->setOrderDescription($description);
    }

    /**
     * Set Extendable
     *
     * @param  bool $extendable
     * @return bool
     */
    public function setExtendable($extendable=true)
    {
        return $this->loanRequest->setOrderExtendable($extendable);
    }

    /**
     * Set Validity
     * @param $validity
     * @return int
     */
    public function setValidity($validity)
    {
        return $this->loanRequest->setOrderValidity($validity);
    }

    public function addCustomer($firstName=NULL, $lastName=NULL, $email=NULL)
    {
        $additionalData = $this->makeAdditionalData();

        $customer = new CustomType\RequestCustomer();

        if ($firstName !== NULL)
            $customer->setFirstName($firstName);

        if ($lastName !== NULL)
            $customer->setLastName($lastName);

        if ($email !== NULL)
            $customer->setEmail($email);

        $additionalData->setCustomer($customer);

        return true;
    }

    protected function makeAdditionalData()
    {
        if (!($this->additionalData instanceof Entity\AdditionalData))
            $this->additionalData = new Entity\AdditionalData();

        return $this->additionalData;
    }

    /**
     * Prepare Loan Request
     *
     * Returns array containing ready Loan Request
     *
     * @return array
     * @throws \Exception
     */
    public function prepareRequest()
    {
        if ($this->loanRequest->getOrderAmount() < 1)
            throw new \Exception('Amount is not set');

        if ($this->loanRequest->getOrderDescription() == '')
            $this->loanRequest->setOrderDescription($this->configuration->getOrderDescription());

        if ($this->loanRequest->getOrderValidity() < time())
            $this->loanRequest->setOrderValidity(time() + $this->configuration->getOrderValidity());

        if ($this->loanRequest->getOrderReference() == '')
            $this->loanRequest->setOrderReference(rand(10,99) . time());

        $ar = [];

        $ar['checkout_version'] = $this->loanRequest->getCheckoutVersion();
        $ar['checkout_type'] = $this->loanRequest->getCheckoutType();
        $ar['merchant_installation'] = $this->loanRequest->getMerchantInstallation();
        $ar['order_description'] = $this->loanRequest->getOrderDescription();
        $ar['order_reference'] = $this->loanRequest->getOrderReference();
        $ar['order_amount'] = $this->loanRequest->getOrderAmount();
        $ar['order_validity'] = date("c", $this->loanRequest->getOrderValidity());
        $ar['order_extendable'] = (int) $this->loanRequest->getOrderExtendable();

        if ($this->additionalData instanceof Entity\AdditionalData)
            $ar['additional_data'] = FieldEncoder::encodeField($this->additionalData->toArray());

        $ar['merchant_hash'] = HashGenerator::genHash($ar, $this->configuration->getKey());

        return $ar;
    }
}
