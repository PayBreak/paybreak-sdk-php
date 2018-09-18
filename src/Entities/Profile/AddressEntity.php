<?php
/*
 * This file is part of the PayBreak/paybreak-sdk-php package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities\Profile;

use WNowicki\Generic\AbstractEntity;

/**
 * Address Entity
 *
 * @author EA
 * @method  setAbode(string $abode)
 * @method  string|null getAbode()
 * @method  setBuildingName(string $buildingName)
 * @method  string|null getBuildingName()
 * @method  setStreet(string $street)
 * @method  string|null getStreet()
 * @method  setLocality(string $locality)
 * @method  string|null getLocality()
 * @method  setTown(string $town)
 * @method  string|null getTown()
 * @method  setPostcode(string $postcode)
 * @method  string|null getPostcode()
 * @method  setMovedIn(string $movedIn)
 * @method  string|null getMovedIn()
 * @method  setResidentialStatus(int $residentialStatus)
 * @method  int|null getResidentialStatus()
 *
 * @package PayBreak\Sdk\Entities\Profile;
 */
class AddressEntity extends AbstractEntity
{
    protected $properties = [
        'abode' => self::TYPE_STRING,
        'building_name' => self::TYPE_STRING,
        'building_number' => self::TYPE_STRING,
        'street' => self::TYPE_STRING,
        'locality' => self::TYPE_STRING,
        'town' => self::TYPE_STRING,
        'postcode' => self::TYPE_STRING,
        'moved_in' => self::TYPE_STRING,
        'residential_status' => self::TYPE_INT,
    ];
}
