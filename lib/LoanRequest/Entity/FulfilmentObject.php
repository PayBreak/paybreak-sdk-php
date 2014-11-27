<?php

namespace PayBreak\Sdk\LoanRequest\Entity;

/**
 * Class FulfilmentObject
 * @package PayBreak\Sdk\LoanRequest\Entity
 * @author Matthew Norris
 */

class FulfilmentObject implements \PayBreak\Sdk\StandardInterface\EntityInterface {

    private $postcode;
    private $address;
    private $reference;

    /**
     * @author Matthew Norris
     * @param string $postcode The postcode
     * @return string
     */
    public function setPostcode($postcode)
    {
        return $this->postcode = $postcode;
    }

    /**
     * @author Matthew Norris
     * @param string $address The address
     * @return string
     */
    public function setAddress($address)
    {
        return $this->address = $address;
    }

    /**
     * @author Matthew Norris
     * @param string The reference
     * @return string
     */
    public function setReference($reference)
    {
        return $this->reference = $reference;
    }

    /**
     * @author Matthew Norris
     * @return string The postcode
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @author Matthew Norris
     * @return string The address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @author Matthew Norris
     * @return string The reference
     */
    public function getReference()
    {
        return $this->reference;
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
     * @return mixed
     */
    public function getId()
    {
        // TODO: Implement getId() method.
    }

    /**
     * Returns entity as array
     * @return array
     */
    public function toArray()
    {
        return [
            "postcode" => $this->postcode,
            "address" => $this->address,
            "reference" => $this->reference
        ];
    }
}
