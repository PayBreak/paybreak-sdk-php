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

use Graham\StandardInterface\EntityInterface;

interface FulfilmentRequestInterface extends EntityInterface
{
    const TYPE_FULL = 1;
    const TYPE_PARTIAL = 2;

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
}
