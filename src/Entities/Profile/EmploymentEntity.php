<?php
/*
 * This file is part of the PayBreak/basket package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities\Profile;

use WNowicki\Generic\AbstractEntity;

/**
 * Employment Entity
 *
 * @author EA
 * @method $this setEmploymentStatus(int $employmentStatus)
 * @method int|null getEmploymentStatus()
 * @method $this setEmploymentStart(string $employmentStart)
 * @method string|null getEmploymentStart()
 * @method $this setEmploymentPhone(string $employmentPhone)
 * @method string|null getEmploymentPhone()
 *
 * @package PayBreak\Sdk\Entities\Profile;
 */
class EmploymentEntity extends AbstractEntity
{
    protected $properties = [
        'employment_status' => self::TYPE_INT,
        'employment_start' => self::TYPE_STRING,
        'phone_employer' => self::TYPE_STRING,
    ];
}
