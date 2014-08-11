<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\StandardInterface;

/**
 * Interface ConfigurationInterface
 *
 * @author WN
 * @package Graham\StandardInterface
 */
interface ConfigurationInterface
{
    /**
     * Merchant Installation
     *
     * @return string
     */
    public function getMerchantInstallation();

    /**
     * Return Key - private shared
     *
     * @return string
     */
    public function getKey();

    /**
     * Checkout Version
     *
     * @return float
     */
    public function getCheckoutVersion();

    /**
     * Default Checkout Type
     *
     * @return int
     */
    public function getCheckoutType();

    /**
     * Default Order Extendable value
     *
     * @return bool
     */
    public function getOrderExtendable();

    /**
     * Default range for Order Validity
     *
     * @return int
     */
    public function getOrderValidity();

    /**
     * Default Order Description
     *
     * @return string
     */
    public function getOrderDescription();
}
