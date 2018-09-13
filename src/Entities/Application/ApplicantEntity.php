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
 * Applicant Entity
 *
 * @author WN
 * @method $this setTitle(string $title)
 * @method string|null getTitle()
 * @method $this setFirstName(string $firstName)
 * @method string|null getFirstName()
 * @method $this setLastName(string $lastName)
 * @method string|null getLastName()
 * @method $this setDateOfBirth(string $dateOfBirth)
 * @method string|null getDateOfBirth()
 * @method $this setEmailAddress(string $emailAddress)
 * @method string|null getEmailAddress()
 * @method $this setPhoneHome(string $phoneHome)
 * @method string|null getPhoneHome()
 * @method $this setPhoneMobile(string $phoneMobile)
 * @method string|null getPhoneMobile()
 * @method $this setPostcode(string $postcode)
 * @method string|null getPostcode()
 * @package PayBreak\Sdk\Entities
 */
class ApplicantEntity extends AbstractEntity
{
    protected $properties = [
        'title',
        'first_name',
        'last_name',
        'date_of_birth',
        'email_address',
        'phone_home',
        'phone_mobile',
        'postcode',
    ];
}
