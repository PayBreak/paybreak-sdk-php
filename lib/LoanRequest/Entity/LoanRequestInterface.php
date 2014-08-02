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

use Graham\StandardInterface\EntityInterface;

/**
 * Interface LoanRequestInterface
 *
 * @package Graham\LoanRequest\Entity
 */
interface LoanRequestInterface extends EntityInterface
{
    const TYPE_SIMPLE = 1;
    const TYPE_EXTENDED = 2;

    /**
     * Returns Checkout Type
     *
     * @return int
     */
    public function getCheckoutType();

    /**
     * Set Checkout Version
     *
     * @param  float $checkoutVersion
     * @return float
     */
    public function setCheckoutVersion($checkoutVersion);

    /**
     * Get Checkout Version
     *
     * @return float
     */
    public function getCheckoutVersion();

    /**
     * Set Merchant Reference
     *
     * @param  string $merchantInstallation
     * @return string
     */
    public function setMerchantInstallation($merchantInstallation);

    /**
     * Get Merchant Reference
     *
     * @return string
     */
    public function getMerchantInstallation();

    /**
     * Set Order Description
     *
     * @param  string $orderDescription
     * @return string
     */
    public function setOrderDescription($orderDescription);

    /**
     * Get Order Description
     *
     * @return string
     */
    public function getOrderDescription();

    /**
     * Set Order Reference
     *
     * @param  string $orderReference
     * @return string
     */
    public function setOrderReference($orderReference);

    /**
     * Get Order Reference
     *
     * @return string
     */
    public function getOrderReference();

    /**
     * Set Order Amount - in pence
     *
     * @param  int $orderAmount
     * @return int
     */
    public function setOrderAmount($orderAmount);

    /**
     * Get Order Amount - in pence
     *
     * @return int
     */
    public function getOrderAmount();

    /**
     * Set Order Validity - timestamp
     *
     * @param  int $orderValidity
     * @return int
     */
    public function setOrderValidity($orderValidity);

    /**
     * Get Order Validity - timestamp
     *
     * @return int
     */
    public function getOrderValidity();

    /**
     * Set Order Extendable
     *
     * @param  bool $orderExtendable
     * @return bool
     */
    public function setOrderExtendable($orderExtendable=true);

    /**
     * Get Order Extanedable - is order extendable
     *
     * @return bool
     */
    public function getOrderExtendable();

    /**
     * Set Additional Data
     *
     * @param  array $additionalData
     * @return array
     */
    public function setAdditionalData(array $additionalData);

    /**
     * Get Additional Data
     *
     * @return array
     */
    public function getAdditionalData();

    /**
     * Set Request Date
     *
     * @param  int   $date
     * @return mixed
     */
    public function setRequestDate($date);

    /**
     * Get Request Date
     *
     * @return int
     */
    public function getRequestDate();
}
