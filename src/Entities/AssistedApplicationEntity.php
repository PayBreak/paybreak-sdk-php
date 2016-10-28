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

/**
 * Assisted Application Entity
 *
 * @author EA, EB, SL
 * @method $this setUser(int $user)
 * @method int|null getUser()
 * @method $this setEmail(string $email)
 * @method string|null getEmail()
 * @package PayBreak\Sdk\Entities
 */
class AssistedApplicationEntity extends ApplicationEntity
{
    protected $properties = [
        'id',
        'posted_date',
        'current_status',
        'customer' => 'PayBreak\Sdk\Entities\Application\CustomerEntity',
        'application_address' => 'PayBreak\Sdk\Entities\Application\AddressEntity',
        'installation',
        'order' => 'PayBreak\Sdk\Entities\Application\OrderEntity',
        'products' => 'PayBreak\Sdk\Entities\Application\ProductsEntity',
        'fulfilment' => 'PayBreak\Sdk\Entities\Application\FulfilmentEntity',
        'applicant' => 'PayBreak\Sdk\Entities\Application\ApplicantEntity',
        'finance' => 'PayBreak\Sdk\Entities\Application\FinanceEntity',
        'cancellation' => 'PayBreak\Sdk\Entities\Application\CancellationEntity',
        'metadata',
        'resume_url',
        'email' => self::TYPE_STRING,
        'user',
    ];
}
