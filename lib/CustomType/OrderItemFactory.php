<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\CustomType;

/**
 * Class OrderItemFactory
 *
 * @author WN
 * @package PayBreak\Sdk\CustomType
 */
class OrderItemFactory
{
    /**
     *
     * @author WN
     * @param array $components
     * @return \PayBreak\Sdk\CustomType\OrderItem
     * @throws \Exception
     */
    public static function make(array $components)
    {
        if (
            !array_key_exists('sku', $components) ||
            !array_key_exists('quantity', $components) ||
            !array_key_exists('price', $components)
        ){
            throw new \Exception('At least sku and quantity must be defined.');
        }

        $item = new OrderItem();

        $item->setSku($components['sku']);
        $item->setQuantity($components['quantity']);
        $item->setPrice($components['price']);

        if (array_key_exists('gtin', $components)) $item->setGtin($components['gtin']);
        if (array_key_exists('description', $components)) $item->setDescription($components['description']);
        if (array_key_exists('fulfillable', $components)) $item->setFulfillable($components['fulfillable']);
        if (array_key_exists('fulfilled', $components)) $item->setFulfilled($components['fulfilled']);

        return $item;
    }
}
