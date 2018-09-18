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
 * Installation Entity
 *
 * @author WN
 * @method $this setId(int $id)
 * @method string|null getId()
 * @method $this setName(string $name)
 * @method string|null getName()
 * @method $this setReturnUrl(string $returnUrl)
 * @method string|null getReturnUrl()
 * @method $this setNotificationUrl(string $notificationUrl)
 * @method string|null getNotificationUrl()
 * @method $this setDefaultProduct(string $defaultProduct)
 * @method string|null getDefaultProduct()
 * @method $this setFeatures(Installation\FeaturesEntity $featuresEntity)
 * @method Installation\FeaturesEntity|null getFeatures()
 * @package PayBreak\Sdk\Entities
 */
class InstallationEntity extends AbstractEntity
{
    protected $properties = [
        'id',
        'name',
        'return_url',
        'notification_url',
        'default_product',
        'features' => 'PayBreak\Sdk\Entities\Installation\FeaturesEntity',
    ];
}
