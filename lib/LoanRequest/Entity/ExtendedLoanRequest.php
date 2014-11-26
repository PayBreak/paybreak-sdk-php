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

use PayBreak\Sdk\CustomType\OrderItem;

/**
 * Class ExtendedLoanRequest
 *
 * @author WN
 * @package PayBreak\Sdk\LoanRequest\Entity
 */
class ExtendedLoanRequest extends LoanRequestAbstract
{
    protected $orderItems = [];

    /**
     * Returns Checkout Type
     *
     * @return int
     */
    public function getCheckoutType()
    {
        return self::TYPE_EXTENDED;
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
    protected function updateOrderAmount()
    {
        $amount = 0;

        foreach ($this->getOrderItems() as $item) {
            $amount += $item->getPrice() * $item->getQuantity();
        }

        return $this->setOrderAmount($amount);
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
        $ar = parent::toArray();

        foreach ($this->getOrderItems() as $k => $v) {
            $ar['order_items'][$k] = $v->toArray();
        }

        return $ar;
    }

}
