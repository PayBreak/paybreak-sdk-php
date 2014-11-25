<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\CustomType;

use PayBreak\Sdk\StandardInterface\EntityInterface;

/**
 * Class RequestCustomer. Stores details about the customer.
 * This is so fields can be pre-populated on the loan request form.
 *
 * @author WN
 * @author Matthew Norris
 *
 * @package PayBreak\Sdk\CustomType
 */
class RequestCustomer implements EntityInterface
{
    protected $dob;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $phoneMobile;
    protected $phonePersonal;
    protected $postcode;
    protected $title;

    /**
     * @param string $dob Customer's date of birth (YYYY-MM-DD)
     */
    public function setDob($dob)
    {
        return $this->dob = $dob;
    }

    /**
     * @return string Customer's date of birth (YYYY-MM-DD)
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set First Name
     *
     * @param  string $firstName Customer's first name

     */
    public function setFirstName($firstName)
    {
        return $this->firstName = $firstName;
    }

    /**
     * @return string Customer's first name
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName Customer's last name
     */
    public function setLastName($lastName)
    {
        return $this->lastName = $lastName;
    }

    /**
     * @return string Customer's last name
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $email Customer's email
     */
    public function setEmail($email)
    {
        return $this->email = $email;
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $phoneMobile Customer's mobile phone number.
     */
    public function setPhoneMobile($phoneMobile)
    {
        return $this->phoneMobile = $phoneMobile;
    }

    /**
     * @return string Customer's mobile phone number.
     */
    public function getPhoneMobile()
    {
        return $this->phoneMobile;
    }

    /**
     * @param string $phonePersonal Customer's personal phone number.
     */
    public function setPhonePersonal($phonePersonal)
    {
        return $this->phonePersonal = $phonePersonal;
    }

    /**
     * @return string Customer's personal phone number.
     */
    public function getPhonePersonal()
    {
        return $this->phonePersonal;
    }

    /**
     * @param string $postcode Customer's postcode
     */
    public function setPostcode($postcode)
    {
        return $this->postcode = $postcode;
    }

    /**
     * @return string Customer's postcode
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param string $title Customer's title
     */
    public function setTitle($title)
    {
        return $this->title = $title;
    }

    /**
     * @return string Customer's title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Entity unique ID
     *
     * @param  mixed $id
     * @return mixed
     */
    public function setId($id)
    {
        return null;
    }

    /**
     * Entity Unique ID
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getEmail();
    }

    /**
     * Returns entity as array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'first_name' => $this->getFirstName(),
            'last_name'  => $this->getLastName(),
            'email'      => $this->getEmail()
        ];
    }

}
