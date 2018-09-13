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
 * Address Entity
 *
 * @author WN
 * @method $this setAbode(string $abode)
 * @method string|null getAbode()
 * @method $this setBuildingName(string $buildingName)
 * @method string|null getBuildingName()
 * @method $this setBuildingNumber(string $buildingNumber)
 * @method string|null getBuildingNumber()
 * @method $this setStreet(string $street)
 * @method string|null getStreet()
 * @method $this setLocality(string $locality)
 * @method string|null getLocality()
 * @method $this setTown(string $town)
 * @method string|null getTown()
 * @method $this setPostcode(string $postcode)
 * @method string|null getPostcode()
 * @package PayBreak\Sdk\Entities
 */
class AddressEntity extends AbstractEntity
{
    protected $properties = [
        'abode',
        'building_name',
        'building_number',
        'street',
        'locality',
        'town',
        'postcode',
    ];
}
