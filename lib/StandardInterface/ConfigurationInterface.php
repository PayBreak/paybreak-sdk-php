<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\StandardInterface;

/**
 * Interface ConfigurationInterface
 *
 * @author WN
 * @package PayBreak\Sdk\StandardInterface
 */
interface ConfigurationInterface
{
    const VERSION_CHECKOUT_TYPE_REMOVED = 3.3;

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

    /**
     * Hash Generation Method
     *
     * Refer to \PayBreak\Sdk\HashGenerator::TYPE_???
     *
     * @author WN
     * @return string
     */
    public function getHashMethod();
}
