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

use PayBreak\Sdk\StandardInterface\EntityInterface;

/**
 * Class OrderItem
 *
 * @author WN
 * @package PayBreak\Sdk\CustomType
 */
class OrderItem implements EntityInterface
{

    protected $sku;
    protected $gtin;
    protected $description;
    protected $price;
    protected $quantity;
    protected $fulfillable;

    /**
     * Set SKU
     *
     * @param  string $sku
     * @return string
     */
    public function setSku($sku)
    {
        return $this->sku = $sku;
    }

    /**
     * Get SKU
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set GTIN
     *
     * @param  string $gtin
     * @return string
     */
    public function setGtin($gtin)
    {
        return $this->gtin = $gtin;
    }

    /**
     * Get GTIN
     *
     * @return string
     */
    public function getGtin()
    {
        return $this->gtin;
    }

    /**
     * Set Description
     *
     * @param  string $description
     * @return string
     */
    public function setDescription($description)
    {
        return $this->description = $description;
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Price
     * @param  int $price
     * @return int
     */
    public function setPrice($price)
    {
        return $this->price = $price;
    }

    /**
     * Get Price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set Quantity
     *
     * @param  int $quantity
     * @return int
     */
    public function setQuantity($quantity)
    {
        return $this->quantity = $quantity;
    }

    /**
     * Get Quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set Fultillable
     *
     * @param  bool $fulfillable
     * @return bool
     */
    public function setFulfillable($fulfillable=true)
    {
        return $this->fulfillable = $fulfillable;
    }

    /**
     * Get Fulfillable
     *
     * @return bool
     */
    public function getFulfillable()
    {
        return $this->fulfillable;
    }

    /**
     * Entity unique ID
     *
     * @param  mixed $id
     * @return mixed
     */
    public function setId($id)
    {
        return $this->setSku($id);
    }

    /**
     * Entity Unique ID
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getSku();
    }

    /**
     * Returns entity as array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'sku' => $this->getSku(),
            'gtin' => $this->getGtin(),
            'description' => $this->getDescription(),
            'price' => $this->getPrice(),
            'quantity' => $this->getQuantity(),
            'fulfillable' => $this->getFulfillable(),
        ];
    }

}
