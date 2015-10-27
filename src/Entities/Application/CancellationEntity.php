<?php
/*
 * This file is part of the PayBreak/basket package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities\Application;

use WNowicki\Generic\AbstractEntity;

/**
 * Cancellation Entity
 *
 * @author WN
 * @method $this setRequested(bool $requested)
 * @method bool|null getRequested()
 * @method $this setEffectiveDate(string $effectiveDate)
 * @method string|null getEffectiveDate()
 * @method $this setRequestedDate(string $requestedDate)
 * @method string|null getRequestedDate()
 * @method $this setDescription(string $description)
 * @method string|null getDescription()
 * @method $this setFeeAmount(int $feeAmount)
 * @method int|null getFeeAmount()
 * @package PayBreak\Sdk\Entities\Application
 */
class CancellationEntity extends AbstractEntity
{
    protected $properties = [
        'requested'         => self::TYPE_BOOL,
        'effective_date'    => self::TYPE_STRING,
        'requested_date'    => self::TYPE_STRING,
        'description'       => self::TYPE_STRING,
        'fee_amount'        => self::TYPE_INT,
    ];
}
