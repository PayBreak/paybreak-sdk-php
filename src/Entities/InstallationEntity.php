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

use PayBreak\Sdk\Entities\Installation\FeaturesEntity;
use WNowicki\Generic\AbstractEntity;

/**
 * Installation Entity
 *
 * @author WN
 * @method $this setId($id)
 * @method string|null getId()
 * @method $this setName($name)
 * @method string|null getName()
 * @method $this setReturnUrl($returnUrl)
 * @method string|null getReturnUrl()
 * @method $this setNotificationUrl($notificationUrl)
 * @method string|null getNotificationUrl()
 * @method $this setDefaultProduct($defaultProduct)
 * @method string|null getDefaultProduct()
 * @method $this setFeatures(FeaturesEntity $features)
 * @method FeaturesEntity|null getFeatures()
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
        'features' => FeaturesEntity::class,
    ];
}
