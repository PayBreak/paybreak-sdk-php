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
 * Deposit Entity
 *
 * @author EB
 * @method $this setMinimumPercentage(float $minimumPercentage)
 * @method float|null getMinimumPercentage()
 * @method $this setMaximumPercentage(float $maximumPercentage)
 * @method float|null getMaximumPercentage()
 * @method $this setMinimumAmount(int $minimumAmount)
 * @method int|null getMinimumAmount()
 * @method $this setMaximumAmount(int $maximumAmount)
 * @method int|null getMaximumAmount()
 * @package PayBreak\Sdk\Entities
 */
class DepositEntity extends AbstractEntity
{
    protected $properties = [
        'minimum_percentage',
        'maximum_percentage',
        'minimum_amount',
        'maximum_amount',
    ];
}
