<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\CustomType;

use Graham\StandardInterface\EntityInterface;

/**
 * Class RequestCustomer
 *
 * @author WN
 * @package Graham\CustomType
 */
class RequestCustomer implements EntityInterface
{

    protected $firstName;
    protected $lastName;
    protected $email;

    /**
     * Set First Name
     *
     * @param  string $firstName
     * @return string
     */
    public function setFirstName($firstName)
    {
        return $this->firstName = $firstName;
    }

    /**
     * Get First Name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set Last Name
     *
     * @param  string $lastName
     * @return string
     */
    public function setLastName($lastName)
    {
        return $this->lastName = $lastName;
    }

    /**
     * Get Last Name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set Email
     * @param  string $email
     * @return string
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
