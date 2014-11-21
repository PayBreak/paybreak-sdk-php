<?php
/**
 * Created by PhpStorm.
 * User: matthewnorris
 * Date: 21/11/14
 * Time: 11:32
 */

namespace PayBreak\Sdk\LoanRequest\Entity;


class FulfilmentObject implements \PayBreak\Sdk\StandardInterface\EntityInterface {

    private $postcode;
    private $address;
    private $reference;

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getReference() {
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
        return [
            "postcode" => $this->postcode,
            "address" => $this->address,
            "reference" => $this->reference
        ];
    }
}