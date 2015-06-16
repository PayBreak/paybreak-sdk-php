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
use Carbon\Carbon;
use PayBreak\Sdk\CustomType\OrderItem;
use PayBreak\Sdk\CustomType\OrderItemFactory;
use PayBreak\Sdk\LoanRequest\Entity\ExtendedLoanRequest;
use PayBreak\Sdk\LoanRequest\Entity\LoanRequest;
use PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface;
use PayBreak\Sdk\LoanRequest\Entity\SimpleLoanRequest;
use PayBreak\Sdk\StandardInterface\ConfigurationInterface;

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

        $loanRequest = new LoanRequest();

        if (
            !array_key_exists('checkout_version', $components)
            || (
                array_key_exists('checkout_version', $components)
                && $components["checkout_version"] < ConfigurationInterface::VERSION_CHECKOUT_TYPE_REMOVED
            )
        ) {
            $loanRequest->setCheckoutType($components["checkout_type"]);
        }
        if (array_key_exists('product_group_code', $components)) $loanRequest->setProductGroupCode($components['product_group_code']);
        if (array_key_exists('product_group_description', $components)) $loanRequest->setProductGroupDescription($components['product_group_description']);
        if (array_key_exists('id', $components)) $loanRequest->setId($components['id']);
        if (array_key_exists('checkout_version', $components)) $loanRequest->setCheckoutVersion($components['checkout_version']);
        if (array_key_exists('merchant_installation', $components)) $loanRequest->setMerchantInstallation($components['merchant_installation']);
        if (array_key_exists('order_description', $components)) $loanRequest->setOrderDescription($components['order_description']);
        if (array_key_exists('order_reference', $components)) $loanRequest->setOrderReference($components['order_reference']);
        if (array_key_exists('order_amount', $components)) $loanRequest->setOrderAmount($components['order_amount']);
        if (array_key_exists('loan_amount', $components)) $loanRequest->setLoanAmount($components['loan_amount']);
        if (array_key_exists('subsidy', $components)) $loanRequest->setSubsidy($components['subsidy']);
        if (array_key_exists('deposit', $components)) $loanRequest->setDeposit($components['deposit']);
        if (array_key_exists('net_settlement', $components)) $loanRequest->setNetSettlement($components['net_settlement']);
        if (array_key_exists('order_validity', $components)) {
            if ($components['order_validity'] instanceof Carbon) {
                $loanRequest->setOrderValidity($components['order_validity']);
            } elseif (is_int($components['order_validity'])) {
                $loanRequest->setOrderValidity(Carbon::createFromTimestamp($components['order_validity']));
            } else {
                throw new \Exception('Unrecognisable date format');
            }
        }
        if (array_key_exists('order_extendable', $components)) $loanRequest->setOrderExtendable($components['order_extendable']);
        if (array_key_exists('request_date', $components)) {
            if ($components['request_date'] instanceof Carbon) {
                $loanRequest->setRequestDate($components['request_date']);
            } elseif (is_int($components['request_date'])) {
                $loanRequest->setRequestDate(Carbon::createFromTimestamp($components['request_date']));
            } else {
                throw new \Exception('Unrecognisable date format');
            }
        }
        if (array_key_exists('status', $components)) $loanRequest->setStatus($components['status']);
        if (array_key_exists('fulfilled', $components)) $loanRequest->setFulfilled($components['fulfilled']);
        // TODO: Additional Data to implement
        if (
            (
                $loanRequest->getCheckoutVersion() >= ConfigurationInterface::VERSION_CHECKOUT_TYPE_REMOVED ||
                $loanRequest->getCheckoutType() == LoanRequestInterface::TYPE_EXTENDED
            ) &&
            array_key_exists('order_items', $components) &&
            is_array($components['order_items'])
        ) {
            foreach ($components['order_items'] as $item) {
                if ($item instanceof OrderItem) {
                    $loanRequest->addOrderItem($item);
                } elseif (is_array($item)) {
                    $loanRequest->addOrderItem(OrderItemFactory::make($item));
                } else {
                    throw new \Exception('Wrong type of data!');
                }
            }
        }
        return $loanRequest;
    }
}
