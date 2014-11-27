<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\LoanRequest\Entity;

use Carbon\Carbon;
use PayBreak\Sdk\StandardInterface\EntityInterface;

/**
 * Interface LoanRequestInterface
 *
 * @author WN
 * @package PayBreak\Sdk\LoanRequest\Entity
 */
interface LoanRequestInterface extends EntityInterface
{
    const TYPE_SIMPLE = 1;
    const TYPE_EXTENDED = 2;

    const STATUS_PENDING = 0;
    const STATUS_REQUESTED = 1;
    const STATUS_CANCELLED = 2;
    const STATUS_UNSUCCESSFUL = 4;
    const STATUS_REFERRED = 8;
    const STATUS_CONVERTED = 16;

    const FULFILLED_NONE = 0;
    const FULFILLED_PARTIAL = 1;
    const FULFILLED_FULL = 2;

    const FULFILMENT_TYPE_STANDARD = 0;
    const FULFILMENT_TYPE_ALTERNATIVE = 1; // means that it's an alternative fulfilment address
    const FULFILMENT_TYPE_COLLECT = 2;

    /**
     * Returns Checkout Type
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
     * @param  \Carbon\Carbon $orderValidity
     * @return \Carbon\Carbon
     */
    public function setOrderValidity(Carbon $orderValidity);

    /**
     * Get Order Validity - timestamp
     *
     * @return \Carbon\Carbon
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
     * @param  AdditionalData $additionalData
     * @return AdditionalData
     */
    public function setAdditionalData(AdditionalData $additionalData);

    /**
     * Get Additional Data
     *
     * @return AdditionalData
     */
    public function getAdditionalData();

    /**
     * Set Request Date
     *
     * @param  \Carbon\Carbon $date
     * @return \Carbon\Carbon
     */
    public function setRequestDate(Carbon $date);

    /**
     * Get Request Date
     *
     * @return \Carbon\Carbon
     */
    public function getRequestDate();

    /**
     * Set Status
     *
     * @param  int $status
     * @return int
     */
    public function setStatus($status);

    /**
     * Get Status
     *
     * @return int
     */
    public function getStatus();

    /**
     * Set Fulfilled
     *
     * @param  int $fulfilled
     * @return int
     */
    public function setFulfilled($fulfilled);

    /**
     * Get Fulfilled
     *
     * @return int
     */
    public function getFulfilled();
}
