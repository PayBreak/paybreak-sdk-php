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

use Graham\HashGenerator;
use Graham\StandardInterface\ConfigurationInterface;

class MakeRequest
{
    protected $loanRequest;
    protected $configuration;

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

    public static function makeSimple(ConfigurationInterface $configuration)
    {
        return new static(Entity\LoanRequestInterface::TYPE_SIMPLE, $configuration);
    }

    public static function makeExtended(ConfigurationInterface $configuration)
    {
        return new static(Entity\LoanRequestInterface::TYPE_EXTENDED, $configuration);
    }

    public function setAmount($amount)
    {
        return $this->loanRequest->setOrderAmount($amount);
    }

    public function setReference($reference)
    {
        return $this->loanRequest->setOrderReference($reference);
    }

    public function setDescription($description)
    {
        return $this->loanRequest->setOrderDescription($description);
    }

    public function setExtendable($extendable=true)
    {
        return $this->loanRequest->setOrderExtendable($extendable);
    }

    public function setValidity($validity)
    {
        return $this->loanRequest->setOrderValidity($validity);
    }

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

        $ar = $this->loanRequest->toArray();

        $ar['order_validity'] = date("c", $ar['order_validity']);

        $ar['order_extendable'] = (int) $ar['order_extendable'];

        unset($ar['additional_data'], $ar['id'],$ar['request_date']);

        $ar['merchant_hash'] = HashGenerator::genHash($ar, $this->configuration->getKey());

        return $ar;
    }
}
