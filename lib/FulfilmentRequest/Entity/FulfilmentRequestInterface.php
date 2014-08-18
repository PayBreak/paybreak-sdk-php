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

use PayBreak\Sdk\StandardInterface\EntityInterface;

/**
 * Interface FulfilmentRequestInterface
 *
 * @author WN
 * @package PayBreak\Sdk\FulfilmentRequest\Entity
 */
interface FulfilmentRequestInterface extends EntityInterface
{
    const TYPE_FULL = 1;
    const TYPE_PARTIAL = 2;

    const STATUS_PENDING = 0;
    const STATUS_REQUESTED = 1;

    /**
     * Get Fulfilment Type
     *
     * @return int
     */
    public function getFulfilmentType();

    /**
     * Set Checkout Type
     *
     * @param  int $checkoutType
     * @return int
     */
    public function setCheckoutType($checkoutType);

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
}
