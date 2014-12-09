<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\FulfilmentRequest\Entity;

use PayBreak\Sdk\StandardInterface\ConfigurationInterface;

/**
 * Class FulfilmentRequestAbstract
 *
 * @author WN
 * @package PayBreak\Sdk\FulfilmentRequest\Entity
 */
abstract class FulfilmentRequestAbstract implements FulfilmentRequestInterface
{
    protected $id;
    protected $checkoutVersion;
    protected $checkoutType;
    protected $merchantInstallation;
    protected $orderReference;
    protected $orderAmount;
    protected $requestDate;
    protected $status;

    /**
     * Entity unique ID
     *
     * @param  mixed $id
     * @return mixed
     */
    public function setId($id)
    {
        return $this->id = $id;
    }

    /**
     * Entity Unique ID
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Checkout Type
     *
     * @param  int $checkoutType
     * @return int
     * @deprecated
     */
    public function setCheckoutType($checkoutType)
    {
        if ($this->getCheckoutVersion() >= ConfigurationInterface::VERSION_CHECKOUT_TYPE_REMOVED) {
            throw new \Exception('checkoutType is not supported in versions '.ConfigurationInterface::VERSION_CHECKOUT_TYPE_REMOVED."+");
        }
        return $this->checkoutType = $checkoutType;
    }

    /**
     * Get Checkout Type
     * @return int
     * @deprecated
     */
    public function getCheckoutType()
    {
        if ($this->getCheckoutVersion() >= ConfigurationInterface::VERSION_CHECKOUT_TYPE_REMOVED) {
            throw new \Exception('checkoutType is not supported in versions '.ConfigurationInterface::VERSION_CHECKOUT_TYPE_REMOVED."+");
        }
        return $this->checkoutType;
    }

    /**
     * Set Checkout Version
     *
     * @param  float $checkoutVersion
     * @return float
     */
    public function setCheckoutVersion($checkoutVersion)
    {
        return $this->checkoutVersion = $checkoutVersion;
    }

    /**
     * Get Checkout Version
     *
     * @return float
     */
    public function getCheckoutVersion()
    {
        return $this->checkoutVersion;
    }

    /**
     * Set Merchant Reference
     *
     * @param  string $merchantInstallation
     * @return string
     */
    public function setMerchantInstallation($merchantInstallation)
    {
        return $this->merchantInstallation = $merchantInstallation;
    }

    /**
     * Get Merchant Reference
     *
     * @return string
     */
    public function getMerchantInstallation()
    {
        return $this->merchantInstallation;
    }

    public function setOrderReference($orderReference)
    {
        return $this->orderReference = $orderReference;
    }

    /**
     * Get Order Reference
     *
     * @return string
     */
    public function getOrderReference()
    {
        return $this->orderReference;
    }

    /**
     * Set Order Amount - in pence
     *
     * @param  int $orderAmount
     * @return int
     */
    public function setOrderAmount($orderAmount)
    {
        return $this->orderAmount = $orderAmount;
    }

    /**
     * Get Order Amount - in pence
     *
     * @return int
     */
    public function getOrderAmount()
    {
        return $this->orderAmount;
    }

    /**
     * Set Request Date
     *
     * @param  int   $date
     * @return mixed
     */
    public function setRequestDate($date)
    {
        return $this->requestDate = $date;
    }

    /**
     * Get Request Date
     *
     * @return int
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * Set Status
     *
     * @param  int $status
     * @return int
     */
    public function setStatus($status)
    {
        return $this->status = $status;
    }

    /**
     * Get Status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns entity as array
     *
     * @return array
     */
    public function toArray()
    {
        $out = [
            'id'                    => $this->getId(),
            'fulfilment_type'       => $this->getFulfilmentType(),
            'checkout_version'      => $this->getCheckoutVersion(),
            'merchant_installation' => $this->getMerchantInstallation(),
            'order_reference'       => $this->getOrderReference(),
            'order_amount'          => $this->getOrderAmount(),
            'request_date'          => $this->getRequestDate(),
            'status'                => $this->getStatus(),
        ];
        if ($this->getCheckoutVersion() < ConfigurationInterface::VERSION_CHECKOUT_TYPE_REMOVED) {
            $out['checkout_type'] = $this->getCheckoutType();
        }
        return $out;
    }

}
