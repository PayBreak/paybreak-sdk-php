<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\LoanRequest\Factory;

use PayBreak\Sdk\LoanRequest\Entity\ExtendedLoanRequest;
use PayBreak\Sdk\LoanRequest\Entity\SimpleLoanRequest;

/**
 * Class LoanRequestFactory
 *
 * @author WN
 * @package PayBreak\Sdk\LoanRequest\Factory
 */
class LoanRequestFactory
{
    /**
     * @author WN
     * @param array $components
     * @return \PayBreak\Sdk\LoanRequest\Entity\ExtendedLoanRequest|\PayBreak\Sdk\LoanRequest\Entity\SimpleLoanRequest
     * @throws \Exception
     */
    public static function make(array $components)
    {
        if (!array_key_exists('checkout_type', $components)) throw new \Exception('At least checkout_type must be defined.');

        if ($components['checkout_type'] == 1) {

            $loanRequest = new SimpleLoanRequest();

        } elseif ($components['checkout_type'] == 2) {

            $loanRequest = new ExtendedLoanRequest();

        } else {

            throw new \Exception('Unrecognised checkout_type!');
        }

        if (array_key_exists('id', $components)) $loanRequest->setId($components['id']);
        if (array_key_exists('checkout_version', $components)) $loanRequest->setCheckoutVersion($components['checkout_version']);
        if (array_key_exists('merchant_installation', $components)) $loanRequest->setMerchantInstallation($components['merchant_installation']);
        if (array_key_exists('order_description', $components)) $loanRequest->setOrderDescription($components['order_description']);
        if (array_key_exists('order_reference', $components)) $loanRequest->setOrderReference($components['order_reference']);
        if (array_key_exists('order_amount', $components)) $loanRequest->setOrderAmount($components['order_amount']);
        if (array_key_exists('order_validity', $components)) $loanRequest->setOrderValidity($components['order_validity']);
        if (array_key_exists('order_extendable', $components)) $loanRequest->setOrderExtendable($components['order_extendable']);
        if (array_key_exists('request_date', $components)) $loanRequest->setRequestDate($components['request_date']);
        if (array_key_exists('status', $components)) $loanRequest->setStatus($components['status']);
        if (array_key_exists('fulfilled', $components)) $loanRequest->setFulfilled($components['fulfilled']);

        // TODO: Additional Data to implement

        if ($loanRequest->getCheckoutType() == 2) {

            // TODO: Order Items
        }

        return $loanRequest;
    }
}
