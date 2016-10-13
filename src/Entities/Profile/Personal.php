<?php

namespace App\Gateways\Entities\Profile;

use WNowicki\Generic\AbstractEntity;

/**
 * Personal Entity
 *
 * @author EB
 * @method string|null getEmail()
 * @method setEmail($email)
 * @method string|null getTitle()
 * @method setTitle($title)
 * @method string|null getFirstName()
 * @method setFirstName($firstName)
 * @method string|null getLastName()
 * @method setLastName($lastName)
 * @method string|null getDateOfBirth()
 * @method setDateOfBirth($dateOfBirth)
 * @method string|null getPhoneMobile()
 * @method setPhoneMobile($phoneMobile)
 * @method string|null getPhoneHome()
 * @method setPhoneHome($phoneHome)
 *
 * @package App\Gateways\Entities\Profile
 */
class Personal extends AbstractEntity
{
    protected $properties = [
        'email' => self::TYPE_STRING,
        'title' => self::TYPE_STRING,
        'first_name' => self::TYPE_STRING,
        'last_name' => self::TYPE_STRING,
        'date_of_birth' => self::TYPE_STRING,
        'phone_mobile' => self::TYPE_STRING,
        'phone_home' => self::TYPE_STRING,
    ];
}
