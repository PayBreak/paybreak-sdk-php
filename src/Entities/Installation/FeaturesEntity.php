<?php
/*
 * This file is part of the PayBreak/paybreak-sdk-php package.
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
 * @method $this setCollectFulfilment(bool $collectFulfilment)
 * @method bool|null getCollectFulfilment()
 * @method $this setUploadDocuments(bool $uploadDocuments)
 * @method bool|null getUploadDocuments()
 * @method $this setLeadScore(bool $leadScore)
 * @method bool|null getLeadScore()
 * @package PayBreak\Sdk\Entities
 */
class FeaturesEntity extends AbstractEntity
{
    protected $properties = [
        'merchant_liable',
        'collect_fulfilment',
        'upload_documents',
        'lead_score',
    ];
}
