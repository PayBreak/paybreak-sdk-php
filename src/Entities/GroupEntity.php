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
     * Make Entity
     *
     * @author WN
     * @param array $components
     * @return static
     */
    public static function make(array $components)
    {
        $entity = parent::make($components);

        if (array_key_exists('products', $components)) {
            foreach ($components['products'] as $product) {
                if (is_array($product)) {
                    $entity->addProduct(ProductEntity::make($product));
                    continue;
                }
                if ($product instanceof ProductEntity) {
                    $entity->addProduct($product);
                }
            }
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
