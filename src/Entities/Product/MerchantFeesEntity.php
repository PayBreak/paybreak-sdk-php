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
 * Merchant Fees Entity
 *
 * @author EB
 * @method $this setPercentage(int $percentage)
 * @method int|null getPercentage()
 * @method $this setMinimumAmount(int $minimumAmount)
 * @method int|null getMinimumAmount()
 * @method $this setMaximumAmount(int $maximumAmount)
 * @method int|null getMaximumAmount()
 * @method $this setCancellation(int $cancellation)
 * @method int|null getCancellation()
 * @method $this setClawbackSubsidyRefundPercentage(float $clawbackSubsidyRefundPercentage)
 * @method float|null getClawbackSubsidyRefundPercentage()
 * @package PayBreak\Sdk\Entities
 */
class MerchantFeesEntity extends AbstractEntity
{
    protected $properties = [
        'percentage',
        'minimum_amount',
        'maximum_amount',
        'cancellation',
        'clawback_subsidy_refund_percentage',
    ];
}
