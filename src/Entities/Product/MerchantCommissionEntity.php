<?php
/*
 * This file is part of the PayBreak/basket package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities\Product;

use WNowicki\Generic\AbstractEntity;

/**
 * Merchant Commission Entity
 *
 * @author EB
 * @method $this setPercentage(float $merchantCommission)
 * @method float|null getPercentage()
 * @method $this setMinimumAmount(int $maxMerchantCommission)
 * @method int|null getMinimumAmount()
 * @method $this setMaximumAmount(int $maxMerchantCommission)
 * @method int|null getMaximumAmount()
 * @package PayBreak\Sdk\Entities
 */
class MerchantCommissionEntity extends AbstractEntity
{
    protected $properties = [
        'percentage',
        'minimum_amount' => self::TYPE_INT,
        'maximum_amount' => self::TYPE_INT,
    ];
}
