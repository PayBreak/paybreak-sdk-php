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
 * @author EB
 * @method $this setMerchantLiable(bool $merchantLiable)
 * @method bool|null getMerchantLiable()
 * @method $this setCollectFulfilment(bool $collectionFulfilment)
 * @method bool|null getCollectFulfilment()
 * @package PayBreak\Sdk\Entities
 */
class FeaturesEntity extends AbstractEntity
{
    protected $properties = [
        'merchant_liable',
        'collect_fulfilment',
    ];
}
