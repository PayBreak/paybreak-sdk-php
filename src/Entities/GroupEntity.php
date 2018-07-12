<?php
/*
 * This file is part of the PayBreak/basket package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities;

use WNowicki\Generic\AbstractEntity;
use WNowicki\Generic\Exception;

/**
 * Group Entity
 *
 * @author EB
 * @method $this setId(int $id)
 * @method int|null getId()
 * @method $this setName(string $name)
 * @method string|null getName()
 * @package PayBreak\Sdk\Entities
 */
class GroupEntity extends AbstractEntity
{
    private $products = [];

    protected $properties = [
        'id',
        'name',
    ];

    /**
     * @return ProductEntity[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ProductEntity $product
     */
    public function addProduct(ProductEntity $product)
    {
        $this->products[] = $product;
    }

    /**
     * @author EB, WN
     * @param array $products
     * @return $this
     */
    public function setProducts(array $products)
    {
        $this->products = [];

        foreach ($products as $product) {
            if (is_array($product)) {
                $this->addProduct(ProductEntity::make($product));
                continue;
            }

            if ($product instanceof ProductEntity) {
                $this->addProduct($product);
            }
        }

        return $this;
    }

    /**
     * Make Entity
     *
     * @author WN
     * @param array $components
     * @return static
     */
    public static function make(array $components)
    {
        $entity = parent::make($components);

        if (array_key_exists('products', $components) && is_array($components['products'])) {
            $entity->setProducts($components['products']);
        }

        return $entity;
    }

    /**
     * To Array
     *
     * @author WN
     * @param bool $recursively If set to `true` then toArray(true) will be called on each `Arrayable` property
     * @return array
     */
    public function toArray($recursively = false)
    {
        $ar =  parent::toArray($recursively);

        if ($recursively) {
            foreach ($this->getProducts() as $product) {
                $ar['products'][] = $product->toArray();
            }
        }

        return $ar;
    }
}
