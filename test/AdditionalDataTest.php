<?php
/**
 * Created by PhpStorm.
 * User: matthewnorris
 * Date: 26/11/14
 * Time: 11:39
 */

namespace PayBreak\Sdk\Tests;


use PayBreak\Sdk\CustomType\RequestCustomer;
use PayBreak\Sdk\LoanRequest\Entity\AdditionalData;

class AdditionalDataTest extends TestCase {

    /**
     * @var AdditionalData
     */
    private $additionalData;

    protected function setUp()
    {
        $this->additionalData = new AdditionalData();
    }

    protected function tearDown()
    {
        $this->additionalData = null;
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\AdditionalData::setCustomer()
     */
    public function testSetCustomer()
    {
        $customer = new RequestCustomer();
        $this->assertEquals($customer, $this->additionalData->setCustomer($customer));
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\AdditionalData::getCustomer()
     */
    public function testGetCustomer()
    {
        $customer = new RequestCustomer();
        $this->additionalData->setCustomer($customer);
        $this->assertEquals($customer, $this->additionalData->getCustomer());
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\AdditionalData::toArray()
     */
    public function testToArray()
    {
        $customer = new RequestCustomer();
        $this->additionalData->setCustomer($customer);
        $this->assertEquals(
            ["customer" => $customer->toArray()],
            $this->additionalData->toArray()
        );
    }
}