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
 * Commission Entity
 *
 * @author EB
 * @method $this setMerchantCommission(float $merchantCommission)
 * @method float|null getMerchantCommission()
 * @method $this setMinMerchantCommission(int $maxMerchantCommission)
 * @method int|null getMinMerchantCommission()
 * @method $this setMaxMerchantCommission(int $maxMerchantCommission)
 * @method int|null getMaxMerchantCommission()
 * @package PayBreak\Sdk\Entities
 */
class CommissionEntity extends AbstractEntity
{
    protected $properties = [
        'merchant_commission',
        'min_merchant_commission' => self::TYPE_INT,
        'max_merchant_commission' => self::TYPE_INT,
    ];
}
