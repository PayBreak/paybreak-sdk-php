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
    protected $addressCurrent;
    protected $alternativeFulfilment;
    protected $addressFulfilment;

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
     * Set Address Current
     *
     * @param  CustomType\Address $address
     * @return CustomType\Address
     */
    public function setAddressCurrent(CustomType\Address $address)
    {
        return $this->addressCurrent = $address;
    }

    /**
     * Get Address Current
     *
     * @return CustomType\Address
     */
    public function getAddressCurrent()
    {
        return $this->addressCurrent;
    }

    /**
     * Set Alternative Fulfilment
     *
     * @param  bool $alternative
     * @return bool
     */
    public function setAlternativeFulfilment($alternative=true)
    {
        return $this->alternativeFulfilment = $alternative;
    }

    /**
     * Get Alternative Fulfilment
     *
     * @return bool
     */
    public function getAlternativeFulfilment()
    {
        return $this->alternativeFulfilment;
    }

    /**
     * Set Address Fulfilment
     *
     * @param  CustomType\Address $address
     * @return CustomType\Address
     */
    public function setAddressFulfilment(CustomType\Address $address)
    {
        return $this->addressFulfilment = $address;
    }

    /**
     * Get Address Fulfilment
     *
     * @return CustomType\Address
     */
    public function getAddressFulfilment()
    {
        return $this->addressFulfilment;
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

        if ($this->addressCurrent instanceof CustomType\Address)
            $ar['address_current'] = $this->addressCurrent->toArray();

        if ($this->addressFulfilment instanceof CustomType\Address) {
            $ar['alternative_fulfilment'] = $this->getAlternativeFulfilment();
            $ar['address_fulfilment'] = $this->addressFulfilment->toArray();
        }

        return $ar;
    }

}
