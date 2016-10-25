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
 * @method $this setEmail(string $email)
 * @method string|null getEmail()
 * @package PayBreak\Sdk\Entities
 */
class AssistedApplicationEntity extends ApplicationEntity
{
    protected $properties =
        [
            'email' => 'email',
        ];
}
