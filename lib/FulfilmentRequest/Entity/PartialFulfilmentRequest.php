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

use Graham\CustomType\OrderItem;

/**
 * Class PartialFulfilmentRequest
 *
 * @author WN
 * @package Graham\FulfilmentRequest\Entity
 */
class PartialFulfilmentRequest extends FulfilmentRequestAbstract implements FulfilmentRequestInterface
{
    protected $fulfilmentItems = [];

    /**
     * Get Fulfilment Type
     *
     * @return int
     */
    public function getFulfilmentType()
    {
        return self::TYPE_PARTIAL;
    }

    /**
     * Add Item to Fulfill
     *
     * @param  \Graham\CustomType\OrderItem $item
     * @return \Graham\CustomType\OrderItem
     */
    public function addFulfilmentItem(OrderItem $item)
    {
        return $this->fulfilmentItems[$item->getSku()] = $item;
    }

    /**
     * Get Items to Fulfill
     *
     * @return \Graham\CustomType\OrderItem[]
     */
    public function getFulfilmentItems()
    {
        return $this->fulfilmentItems;
    }

}
