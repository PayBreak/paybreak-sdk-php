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
 * @author WN
 * @method $this setPersonal(string $personal)
 * @method string|null getPersonal()
 * @method $this setAddress(string $address)
 * @method string|null getAddress()
 * @method $this setEmployment(string $employment)
 * @method string|null getEmployment()
 * @method $this setFinancial(string $financial)
 * @method string|null getFinancial()
 * @method $this setEmail(string $email)
 * @method string|null getEmail()
 * @package PayBreak\Sdk\Entities
 */
class AssistedApplicationEntity extends ApplicationEntity
{
    protected $properties = [
        'email' => 'email',
    ];
}
