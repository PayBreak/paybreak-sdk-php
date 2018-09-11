<?php
/*
 * This file is part of the PayBreak/paybreak-sdk-php package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities\Product;

use WNowicki\Generic\AbstractEntity;

/**
 * Order Entity
 *
 * @author EB
 * @method $this setMinimumAmount(int $minimumAmount)
 * @method int|null getMinimumAmount()
 * @method $this setMaximumAmount(int $maximumAmount)
 * @method int|null getMaximumAmount()
 * @package PayBreak\Sdk\Entities
 */
class OrderEntity extends AbstractEntity
{
    protected $properties = [
        'minimum_amount',
        'maximum_amount',
    ];
}
