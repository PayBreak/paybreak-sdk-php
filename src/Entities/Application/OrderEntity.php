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
 * Order Entity
 *
 * @author WN
 * @method $this setReference(string $reference)
 * @method string|null getReference()
 * @method $this setAmount(int $amount)
 * @method int|null getAmount()
 * @method $this setDescription(string $description)
 * @method string|null getDescription()
 * @method $this setValidity(string $validity)
 * @method string|null getValidity()
 * @method $this setDepositAmount(int $depositAmount)
 * @method int|null getDepositAmount()
 * @method $this setHold(string $hold)
 * @method string|null getHold()
 * @method $this setHoldReasons(string $holdReasons)
 * @method array|null getHoldReasons()
 * @package PayBreak\Sdk\Entities
 */
class OrderEntity extends AbstractEntity
{
    protected $properties = [
        'reference',
        'amount',
        'description',
        'validity',
        'deposit_amount',
        'hold',
        'hold_reasons',
    ];
}
