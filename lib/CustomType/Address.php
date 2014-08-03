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
 * Class Address
 *
 * @author WN
 * @package Graham\CustomType
 */
class Address implements EntityInterface
{
    protected $abode;
    protected $buildingName;
    protected $buildingNumber;
    protected $street;
    protected $locality;
    protected $town;
    protected $postcode;

    /**
     * Set Abode
     *
     * @param  string $abode
     * @return string
     */
    public function setAbode($abode)
    {
        return $this->abode = $abode;
    }

    /**
     * Get Abode
     *
     * @return string
     */
    public function getAbode()
    {
        return $this->abode;
    }

    /**
     * Set Building Name
     *
     * @param  string $buildingName
     * @return string
     */
    public function setBuildingName($buildingName)
    {
        return $this->buildingName = $buildingName;
    }

    /**
     * Get Building Name
     * @return string
     */
    public function getBuildingName()
    {
        return $this->buildingName;
    }

    /**
     * Set Building Number
     *
     * @param  string $buildingNumber
     * @return string
     */
    public function setBuildingNumber($buildingNumber)
    {
        return $this->buildingNumber = $buildingNumber;
    }

    /**
     * Get Building Number
     *
     * @return string
     */
    public function getBuildingNumber()
    {
        return $this->buildingNumber;
    }

    /**
     * Set Street
     *
     * @param  string $street
     * @return string
     */
    public function setStreet($street)
    {
        return $this->street = $street;
    }

    /**
     * Get Street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set Locality
     *
     * @param  string $locality
     * @return string
     */
    public function setLocality($locality)
    {
        return $this->locality = $locality;
    }

    /**
     * Get Locality
     *
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set Town
     *
     * @param  string $town
     * @return string
     */
    public function setTown($town)
    {
        return $this->town = $town;
    }

    /**
     * Get Town
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set Postcode
     *
     * @param  string $postcode
     * @return string
     */
    public function setPostcode($postcode)
    {
        return $this->postcode = $postcode;
    }

    /**
     * Get Postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
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
        return null;
    }

    /**
     * Returns entity as array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'abode' => $this->getAbode(),
            'building_name' => $this->getBuildingName(),
            'building_number' => $this->getBuildingNumber(),
            'street' => $this->getStreet(),
            'locality' => $this->getLocality(),
            'town' => $this->getTown(),
            'postcode' => $this->getPostcode(),
        ];
    }

}
