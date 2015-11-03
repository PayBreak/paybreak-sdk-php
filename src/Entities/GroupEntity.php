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
 * Application Entity
 *
 * @author EB
 * @method $this setId(int $id)
 * @method int|null getId()
 * @method $this setName(string $name)
 * @method string|null getName()
 * @method $this setProducts(ProductEntity $products)
 * @method ProductEntity|null getProducts()
 * @package PayBreak\Sdk\Entities
 */
class GroupEntity extends AbstractEntity
{
    protected $properties = [
        'id' => self::TYPE_STRING,
        'name' => self::TYPE_STRING,
        'products' => self::TYPE_ARRAY,
    ];
}
