<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\FulfilmentRequest\Entity;

abstract class FulfilmentRequestAbstract implements FulfilmentRequestInterface
{
    protected $id;
    protected $checkoutVersion;
    protected $checkoutType;
    protected $merchantInstallation;
    protected $orderReference;
    protected $orderAmount;

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
     */
    public function setCheckoutType($checkoutType)
    {
        return $this->checkoutType = $checkoutType;
    }

    /**
     * Get Checkout Type
     *
     * @return int
     */
    public function getCheckoutType()
    {
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
     * Returns entity as array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id'                    => $this->getId(),
            'fulfilment_type'       => $this->getFulfilmentType(),
            'checkout_version'      => $this->getCheckoutVersion(),
            'checkout_type'         => $this->getCheckoutType(),
            'merchant_installation' => $this->getMerchantInstallation(),
            'order_reference'       => $this->getOrderReference(),
            'order_amount'          => $this->getOrderAmount(),
        ];
    }

}
