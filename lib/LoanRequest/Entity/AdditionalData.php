<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\LoanRequest\Entity;

use PayBreak\Sdk\CustomType;

/**
 * Class AdditionalData
 *
 * @author WN
 * @package PayBreak\Sdk\LoanRequest\Entity
 */
class AdditionalData implements \PayBreak\Sdk\StandardInterface\EntityInterface
{
    protected $customer;

    /**
     * Set Customer
     *
     * @param  CustomType\RequestCustomer $customer
     * @return CustomType\RequestCustomer
     */
    public function setCustomer(CustomType\RequestCustomer $customer)
    {
        return $this->customer = $customer;
    }

    /**
     * Get Customer
     *
     * @return CustomType\RequestCustomer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Entity unique ID
     *
     * @param  mixed $id
     * @return mixed
     */
    public function setId($id)
    {
        // TODO: Implement setId() method.
    }

    /**
     * Entity Unique ID
     *
     * @return mixed
     */
    public function getId()
    {
        // TODO: Implement getId() method.
    }

    /**
     * Returns entity as array
     *
     * @return array
     */
    public function toArray()
    {
        $ar = [];

        if ($this->customer instanceof CustomType\RequestCustomer)
            $ar['customer'] = $this->customer->toArray();

        return $ar;
    }

}
