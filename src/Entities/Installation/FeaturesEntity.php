<?php
/*
 * This file is part of the PayBreak/basket package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities\Installation;

use WNowicki\Generic\AbstractEntity;

/**
 * Features Entity
 *
 * @method $this setAssistedJourney(bool $assistedJourney)
 * @method bool getAssistedJourney()
 *
 * @author WN
 * @package PayBreak\Sdk\Entities\Installation
 */
class FeaturesEntity extends AbstractEntity
{
    protected $properties = [
        'assisted_journey' => self::TYPE_BOOL,
    ];
}
