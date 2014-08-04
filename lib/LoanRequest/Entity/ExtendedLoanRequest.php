<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\LoanRequest\Entity;

use Graham\CustomType\OrderItem;

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
     * @param  \Graham\CustomType\OrderItem $orderItem
     * @return \Graham\CustomType\OrderItem
     */
    public function addOrderItem(OrderItem $orderItem)
    {
        return $this->orderItems[$orderItem->getSku()] = $orderItem;
    }

    /**
     * Get Order Items
     *
     * @return \Graham\CustomType\OrderItem[]
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

}
