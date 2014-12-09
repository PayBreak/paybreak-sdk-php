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
use PayBreak\Sdk\CustomType\OrderItem;
use PayBreak\Sdk\StandardInterface\ConfigurationInterface;

/**
 * Class LoanRequest
 *
 * @author WN
 * @author MN
 * @package PayBreak\Sdk\LoanRequest\Entity
 */
class LoanRequest implements LoanRequestInterface
{
    protected $id;
    protected $checkoutVersion;
    protected $merchantInstallation;
    protected $orderDescription;
    protected $orderReference;
    protected $orderAmount;
    protected $orderValidity;
    protected $orderExtendable = false;
    protected $additionalData = [];
    protected $requestDate;
    protected $status = self::STATUS_PENDING;
    protected $fulfilled = self::FULFILLED_NONE;
    protected $fulfilmentType = self::FULFILMENT_TYPE_STANDARD;
    protected $fulfilmentObject;
    protected $deposit;
    protected $loanProducts = [];
    protected $orderItems = [];
    protected $checkoutType = 2;


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

    /**
     * Set Order Description
     *
     * @param  string $orderDescription
     * @return string
     */
    public function setOrderDescription($orderDescription)
    {
        return $this->orderDescription = $orderDescription;
    }

    /**
     * Get Order Description
     *
     * @return string
     */
    public function getOrderDescription()
    {
        return $this->orderDescription;
    }

    /**
     * Set Order Reference
     *
     * @param  string $orderReference
     * @return string
     */
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
     * Set Order Validity - timestamp
     *
     * @param  \Carbon\Carbon $orderValidity
     * @return \Carbon\Carbon
     */
    public function setOrderValidity(Carbon $orderValidity)
    {
        return $this->orderValidity = $orderValidity;
    }

    /**
     * Get Order Validity - timestamp
     *
     * @return \Carbon\Carbon
     */
    public function getOrderValidity()
    {
        return $this->orderValidity;
    }

    /**
     * Set Order Extendable
     *
     * @param  bool $orderExtendable
     * @return bool
     */
    public function setOrderExtendable($orderExtendable = false)
    {
        return $this->orderExtendable = $orderExtendable;
    }

    /**
     * Get Order Extanedable - is order extendable
     *
     * @return bool
     */
    public function getOrderExtendable()
    {
        return $this->orderExtendable;
    }

    /**
     * Set Additional Data
     *
     * @param  AdditionalData $additionalData
     * @return AdditionalData
     */
    public function setAdditionalData(AdditionalData $additionalData)
    {
        return $this->additionalData = $additionalData;
    }

    /**
     * Get Additional Data
     *
     * @return AdditionalData
     */
    public function getAdditionalData()
    {
        return $this->additionalData;
    }

    /**
     * Set Request Date
     *
     * @param  \Carbon\Carbon $date
     * @return \Carbon\Carbon
     */
    public function setRequestDate(Carbon $date)
    {
        return $this->requestDate = $date;
    }

    /**
     * Get Request Date
     *
     * @return \Carbon\Carbon
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * Set Status
     *
     * @param  int $status
     * @return int
     */
    public function setStatus($status)
    {
        return $this->status = $status;
    }

    /**
     * Get Status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set Fulfilled
     *
     * @param  int $fulfilled
     * @return int
     */
    public function setFulfilled($fulfilled)
    {
        return $this->fulfilled = $fulfilled;
    }

    /**
     * Get Fulfilled
     *
     * @return int
     */
    public function getFulfilled()
    {
        return $this->fulfilled;
    }

    /**
     * @param int $obj The fulfilment type
     * @return int
     */
    public function setFulfilmentType($value)
    {
        return $this->fulfilmentType = $value;
    }

    /**
     * @param FulfilmentObject $obj The fulfilment object
     * @return FulfilmentObject
     */
    public function setFulfilmentObject($obj)
    {
        return $this->fulfilmentObject = $obj;
    }

    /**
     * @return int The fulfilment type
     */
    public function getFulfilmentType()
    {
        return $this->fulfilmentType;
    }

    /**
     * @return FulfilmentObject The fulfilment object.
     */
    public function getFulfilmentObject() {
        return $this->fulfilmentObject;
    }

    /**
     * @param int $deposit Deposit amount, in pence.
     * @return int
     */
    public function setDeposit($deposit)
    {
        return $this->deposit = $deposit;
    }

    /**
     * @return int Deposit amount, in pence.
     */
    public function getDeposit()
    {
        return $this->deposit;
    }

    /**
     * @param array $loanProducts An array of loan product identifiers (strings)
     * @return array
     */
    public function setLoanProducts(array $loanProducts)
    {
        return $this->loanProducts = $loanProducts;
    }

    /**
     * @return array An array of loan product identifiers (strings)
     */
    public function getLoanProducts()
    {
        return $this->loanProducts;
    }

    /**
     * Add Order Item
     *
     * Adds OrderItem object to Request, updates order amount.
     *
     * @param  \PayBreak\Sdk\CustomType\OrderItem $orderItem
     * @return \PayBreak\Sdk\CustomType\OrderItem
     */
    public function addOrderItem(OrderItem $orderItem)
    {
        $this->orderItems[$orderItem->getSku()] = $orderItem;
        $this->updateOrderAmount();

        return $orderItem;
    }

    /**
     * Update Order Amount
     *
     * Updates orderAmount value to be a sum of all items in request (multiplied by quantity of them).
     * Also returns new orderAmount (in pence).
     *
     * @return int
     */
    public function updateOrderAmount()
    {
        $amount = 0;

        foreach ($this->getOrderItems() as $item) {
            $amount += $item->getPrice() * $item->getQuantity();
        }

        return $this->setOrderAmount($amount);
    }

    /**
     * @param int $checkoutType The checkout type
     * @return int
     * @throws \Exception
     * @deprecated
     */
    public function setCheckoutType($checkoutType)
    {
        if ($this->getCheckoutVersion() >= ConfigurationInterface::CHECKOUT_TYPE_REMOVED_VERSION) {
            throw new \Exception('checkoutType is not supported in versions '.ConfigurationInterface::CHECKOUT_TYPE_REMOVED_VERSION."+");
        }
        return $this->checkoutType = $checkoutType;
    }

    /**
     * @return int The checkout type
     * @throws \Exception
     * @deprecated
     */
    public function getCheckoutType()
    {
        if ($this->getCheckoutVersion() >= ConfigurationInterface::CHECKOUT_TYPE_REMOVED_VERSION) {
            throw new \Exception('checkoutType is not supported in versions '.ConfigurationInterface::CHECKOUT_TYPE_REMOVED_VERSION."+");
        }
        return $this->checkoutType;
    }

    /**
     * Get Order Items
     *
     * @return \PayBreak\Sdk\CustomType\OrderItem[]
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    public function toArray()
    {
        $ar = [
            'id' => $this->getId(),
            'checkout_version' => $this->getCheckoutVersion(),
            'merchant_installation' => $this->getMerchantInstallation(),
            'order_description' => $this->getOrderDescription(),
            'order_reference' => $this->getOrderReference(),
            'order_amount' => $this->getOrderAmount(),
            'order_validity' => $this->getOrderValidity()->getTimestamp(),
            'order_extendable' => $this->getOrderExtendable(),
            'additional_data' => $this->getAdditionalData(),
            'request_date' => $this->getRequestDate()->getTimestamp(),
            'deposit' => $this->getDeposit(),
            'fulfilment_type' => $this->getFulfilmentType(),
            'fulfilment_object' => $this->getFulfilmentObject(),
            'loan_products' => $this->getLoanProducts()
        ];
        if ($this->getCheckoutVersion() < ConfigurationInterface::CHECKOUT_TYPE_REMOVED_VERSION) {
            $ar["checkout_type"] = $this->getCheckoutType();
        }

        foreach ($this->getOrderItems() as $k => $v) {
            $ar['order_items'][$k] = $v->toArray();
        }
        return $ar;
    }
}
