<?php
/*
 * This file is part of the PayBreak/paybreak-sdk-php package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities\Application;

use WNowicki\Generic\AbstractEntity;

/**
 * Customer Intelligence Entity
 *
 * @author WN
 * @method $this setLeadScoreId(int $leadScoreId)
 * @method int|null getLeadScoreId()
 */
class CustomerIntelligenceEntity extends AbstractEntity
{
    protected $properties = [
        'lead_score_id' => self::TYPE_INT,
    ];
}
