<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\FulfilmentRequest\Entity;

use PayBreak\Sdk\CustomType\OrderItem;

/**
 * Class PartialFulfilmentRequest
 *
 * @author WN
 * @package PayBreak\Sdk\FulfilmentRequest\Entity
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
     * @param  \PayBreak\Sdk\CustomType\OrderItem $item
     * @return \PayBreak\Sdk\CustomType\OrderItem
     */
    public function addFulfilmentItem(OrderItem $item)
    {
        return $this->fulfilmentItems[$item->getSku()] = $item;
    }

    /**
     * Get Items to Fulfill
     *
     * @return \PayBreak\Sdk\CustomType\OrderItem[]
     */
    public function getFulfilmentItems()
    {
        return $this->fulfilmentItems;
    }

}
