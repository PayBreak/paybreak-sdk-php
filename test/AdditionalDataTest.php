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

    public function testSetCustomer()
    {
        $customer = new RequestCustomer();
        $this->assertEquals($customer, $this->additionalData->setCustomer($customer));
    }

    public function testGetCustomer()
    {
        $customer = new RequestCustomer();
        $this->additionalData->setCustomer($customer);
        $this->assertEquals($customer, $this->additionalData->getCustomer());
    }

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