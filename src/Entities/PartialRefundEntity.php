<?php
/*
 * This file is part of the PayBreak/paybreak-sdk-php package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities;

use WNowicki\Generic\AbstractEntity;

/**
 * Partial Refund Entity
 *
 * @author LH
 * @package PayBreak\Sdk\Entities
 *
 * @method $this setId(int $id)
 * @method int|null getId()
 * @method $this setApplication(int $application)
 * @method int|null getApplication()
 * @method $this setStatus(string $status)
 * @method string|null getStatus()
 * @method $this setRefundAmount(int $refundAmount)
 * @method int|null getRefundAmount()
 * @method $this setEffectiveDate(string $effectiveDate)
 * @method string|null getEffectiveDate()
 * @method $this setRequestedDate(string $requestedDate)
 * @method string|null getRequestedDate()
 * @method $this setDescription(string $description)
 * @method string|null getDescription()
 */
class PartialRefundEntity extends AbstractEntity
{
    protected $properties = [
        'id',
        'application',
        'status',
        'refund_amount',
        'effective_date',
        'requested_date',
        'description',
    ];
}
