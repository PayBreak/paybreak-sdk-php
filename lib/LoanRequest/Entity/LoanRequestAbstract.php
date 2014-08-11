<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\LoanRequest\Entity;

/**
 * Class LoanRequestAbstract
 *
 * @author WN
 * @package Graham\LoanRequest\Entity
 */
abstract class LoanRequestAbstract implements LoanRequestInterface
{
    protected $id;
    protected $checkoutVersion;
    protected $checkoutType;
    protected $merchantInstallation;
    protected $orderDescription;
    protected $orderReference;
    protected $orderAmount;
    protected $orderValidity;
    protected $orderExtendable = false;
    protected $additionalData = [];
    protected $requestDate;
    protected $status = self::STATUS_PENDING;
    protected $fulfilled = self::FULFILLED_NONE;

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

    /**
     * Set Order Description
     *
     * @param  string $orderDescription
     * @return string
     */
    public function setOrderDescription($orderDescription)
    {
        return $this->orderDescription = $orderDescription;
    }

    /**
     * Get Order Description
     *
     * @return string
     */
    public function getOrderDescription()
    {
        return $this->orderDescription;
    }

    /**
     * Set Order Reference
     *
     * @param  string $orderReference
     * @return string
     */
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
     * Set Order Validity - timestamp
     *
     * @param  int $orderValidity
     * @return int
     */
    public function setOrderValidity($orderValidity)
    {
        return $this->orderValidity = $orderValidity;
    }

    /**
     * Get Order Validity - timestamp
     *
     * @return int
     */
    public function getOrderValidity()
    {
        return $this->orderValidity;
    }

    /**
     * Set Order Extendable
     *
     * @param  bool $orderExtendable
     * @return bool
     */
    public function setOrderExtendable($orderExtendable = true)
    {
        return $this->orderExtendable = $orderExtendable;
    }

    /**
     * Get Order Extanedable - is order extendable
     *
     * @return bool
     */
    public function getOrderExtendable()
    {
        return $this->orderExtendable;
    }

    /**
     * Set Additional Data
     *
     * @param  AdditionalData $additionalData
     * @return AdditionalData
     */
    public function setAdditionalData(AdditionalData $additionalData)
    {
        return $this->additionalData = $additionalData;
    }

    /**
     * Get Additional Data
     *
     * @return AdditionalData
     */
    public function getAdditionalData()
    {
        return $this->additionalData;
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
     * Set Fulfilled
     *
     * @param  int $fulfilled
     * @return int
     */
    public function setFulfilled($fulfilled)
    {
        return $this->fulfilled = $fulfilled;
    }

    /**
     * Get Fulfilled
     *
     * @return int
     */
    public function getFulfilled()
    {
        return $this->fulfilled;
    }

    /**
     * Returns entity as array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'checkout_version' => $this->getCheckoutVersion(),
            'checkout_type' => $this->getCheckoutType(),
            'merchant_installation' => $this->getMerchantInstallation(),
            'order_description' => $this->getOrderDescription(),
            'order_reference' => $this->getOrderReference(),
            'order_amount' => $this->getOrderAmount(),
            'order_validity' => $this->getOrderValidity(),
            'order_extendable' => $this->getOrderExtendable(),
            'additional_data' => $this->getAdditionalData(),
            'request_date' => $this->getRequestDate(),
        ];
    }
}
