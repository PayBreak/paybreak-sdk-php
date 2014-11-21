<?php


namespace PayBreak\Sdk\StandardInterface;

/**
 * Dummy config object that uses fields from the database.
 * Class Configuration
 * @package PayBreak\Sdk\StandardInterface
 */

class Configuration implements ConfigurationInterface
{
    /**
     * Merchant Installation
     *
     * @return string
     */
    public function getMerchantInstallation()
    {
        return "TestInstall";
    }

    /**
     * Return Key - private shared
     *
     * @return string
     */
    public function getKey()
    {
        return "SharedSecretKey";
    }

    /**
     * Checkout Version
     *
     * @return float
     */
    public function getCheckoutVersion()
    {
        return "3.2";
    }

    /**
     * Default Checkout Type
     *
     * @return int
     */
    public function getCheckoutType()
    {
       return 1;
    }

    /**
     * Default Order Extendable value
     *
     * @return bool
     */
    public function getOrderExtendable()
    {
        return true;
    }

    /**
     * Default range for Order Validity
     *
     * @return int
     */
    public function getOrderValidity()
    {
        return "2014-11-21T12:00:00+00:00";
    }

    /**
     * Default Order Description
     *
     * @return string
     */
    public function getOrderDescription()
    {
        return "Test order description";
    }

    /**
     * Hash Generation Method
     *
     * Refer to \PayBreak\Sdk\HashGenerator::TYPE_???
     *
     * @author WN
     * @return string
     */
    public function getHashMethod()
    {
        return \PayBreak\Sdk\HashGenerator::TYPE_SHA256;
    }

}