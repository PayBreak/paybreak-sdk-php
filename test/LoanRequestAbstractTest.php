<?php

namespace PayBreak\Sdk\Tests;

use Carbon\Carbon;
use PayBreak\Sdk\LoanRequest\Entity\AdditionalData;
use PayBreak\Sdk\LoanRequest\Entity\FulfilmentObject;
use PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface;

/**
 * Test for LoanRequestAbstract
 * @author Matthew Norris
 */
class LoanRequestAbstractTest extends TestCase {

    /**
     * @var \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract
     */
    private $loanRequest;
    private $additionalData;
    private $fulfilmentObject;
    private $loanProducts;

    protected function setUp()
    {
        // stops Carbon from whining about the time zone
        date_default_timezone_set('Europe/London');

        // Create a mock class that extends the abstract class we're interested in
        $this->loanRequest = $this->getMockForAbstractClass('\PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract');

        // Need this stuff to fully test the loan request object
        $this->additionalData = new AdditionalData();
        $this->fulfilmentObject = new FulfilmentObject();
        $this->loanProducts = ["TEST_PRODUCT"];

        $this->d(print_r($this->loanRequest, true));
    }

    protected function tearDown()
    {
        $this->loanRequest = null;
        $this->additionalData = null;
        $this->fulfilmentObject = null;
        $this->loanProducts = null;
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setId()
     */
    public function testSetId()
    {
        $this->assertEquals(2, $this->loanRequest->setId(2));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getId()
     */
    public function testGetId()
    {
        $this->loanRequest->setId(3);
        $this->assertEquals(3, $this->loanRequest->getId());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setCheckoutVersion()
     */
    public function testSetCheckoutVersion()
    {
        $this->assertEquals("1.23", $this->loanRequest->setCheckoutVersion("1.23"));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getCheckoutVersion()
     */
    public function testGetCheckoutVersion()
    {
        $this->loanRequest->setCheckoutVersion("4.56");
        $this->assertEquals("4.56", $this->loanRequest->getCheckoutVersion());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setMerchantInstallation()
     */
    public function testSetMerchantInstallation()
    {
        $this->assertEquals("test", $this->loanRequest->setMerchantInstallation("test"));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getMerchantInstallation()
     */
    public function testGetMerchantInstallation()
    {
        $this->loanRequest->setMerchantInstallation("test");
        $this->assertEquals("test", $this->loanRequest->getMerchantInstallation());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setOrderDescription()
     */
    public function testSetOrderDescription()
    {
        $this->assertEquals("orderDescription", $this->loanRequest->setOrderDescription("orderDescription"));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getOrderDescription()
     */
    public function testGetOrderDescription()
    {
        $this->loanRequest->setOrderDescription("test");
        $this->assertEquals("test", $this->loanRequest->getOrderDescription());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setOrderReference()
     */
    public function testSetOrderReference()
    {
        $this->assertEquals("test", $this->loanRequest->setOrderReference("test"));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getOrderReference()
     */
    public function testGetOrderReference()
    {
        $this->loanRequest->setOrderReference("test");
        $this->assertEquals("test", $this->loanRequest->getOrderReference());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setOrderAmount()
     */
    public function testSetOrderAmount()
    {
        $this->assertEquals(1234, $this->loanRequest->setOrderAmount(1234));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getOrderAmount()
     */
    public function testGetOrderAmount()
    {
        $this->loanRequest->setOrderAmount(1234);
        $this->assertEquals(1234, $this->loanRequest->getOrderAmount());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setOrderValidity()
     */
    public function testSetOrderValidity()
    {
        $date = Carbon::tomorrow();
        $this->assertEquals(Carbon::tomorrow(), $this->loanRequest->setOrderValidity($date));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getOrderValidity()
     */
    public function testGetOrderValidity()
    {
        $date = Carbon::tomorrow();
        $this->loanRequest->setOrderValidity($date);
        $this->assertEquals($date, $this->loanRequest->getOrderValidity($date));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setOrderExtendable()
     */
    public function testSetOrderExtendable()
    {
        $this->assertEquals(true, $this->loanRequest->setOrderExtendable(true));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getOrderExtendable()
     */
    public function testGetOrderExtendable()
    {
        $this->loanRequest->setOrderExtendable(true);
        $this->assertEquals(true, $this->loanRequest->getOrderExtendable());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setAdditionalData()
     */
    public function testSetAdditionalData()
    {
        $this->assertEquals($this->additionalData, $this->loanRequest->setAdditionalData($this->additionalData));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getAdditionalData()
     */
    public function testGetAdditionalData()
    {
        $this->loanRequest->setAdditionalData($this->additionalData);
        $this->assertEquals($this->additionalData, $this->loanRequest->getAdditionalData());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setRequestData()
     */
    public function testSetRequestDate()
    {
        $date = Carbon::yesterday();
        $this->assertEquals($date, $this->loanRequest->setRequestDate($date));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getRequestData()
     */
    public function testGetRequestDate()
    {
        $date = Carbon::yesterday();
        $this->loanRequest->setRequestDate($date);
        $this->assertEquals($date, $this->loanRequest->getRequestDate());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setStatus()
     */
    public function testSetStatus()
    {
        $this->assertEquals(
            LoanRequestInterface::STATUS_PENDING,
            $this->loanRequest->setStatus(LoanRequestInterface::STATUS_PENDING)
        );
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getStatus()
     */
    public function testGetStatus()
    {
        $this->loanRequest->setStatus(LoanRequestInterface::STATUS_PENDING);
        $this->assertEquals(LoanRequestInterface::STATUS_PENDING, $this->loanRequest->getStatus());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setFulfilled()
     */
    public function testSetFulfilled()
    {
        $this->assertEquals(
            LoanRequestInterface::FULFILLED_FULL,
            $this->loanRequest->setFulfilled(LoanRequestInterface::FULFILLED_FULL)
        );
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getFulfilled()
     */
    public function testGetFulfilled()
    {
        $this->loanRequest->setFulfilled(LoanRequestInterface::FULFILLED_FULL);
        $this->assertEquals(LoanRequestInterface::FULFILLED_FULL, $this->loanRequest->getFulfilled());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setFulfilmentType()
     */
    public function testSetFulfilmentType()
    {
        $this->assertEquals(
            LoanRequestInterface::FULFILMENT_TYPE_ALTERNATIVE,
            $this->loanRequest->setFulfilmentType(LoanRequestInterface::FULFILMENT_TYPE_ALTERNATIVE)
        );
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getFulfilmentType()
     */
    public function testGetFulfilmentType()
    {
        $this->loanRequest->setFulfilmentType(LoanRequestInterface::FULFILMENT_TYPE_ALTERNATIVE);
        $this->assertEquals(LoanRequestInterface::FULFILMENT_TYPE_ALTERNATIVE, $this->loanRequest->getFulfilmentType());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setFulfilmentObject()
     */
    public function testSetFulfilmentObject()
    {
        $this->assertEquals($this->fulfilmentObject, $this->loanRequest->setFulfilmentObject($this->fulfilmentObject));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getFulfilmentObject()
     */
    public function testGetFulfilmentObject()
    {
        $this->loanRequest->setFulfilmentObject($this->fulfilmentObject);
        $this->assertEquals($this->fulfilmentObject, $this->loanRequest->getFulfilmentObject($this->fulfilmentObject));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setDeposit()
     */
    public function testSetDeposit()
    {
        $this->assertEquals(9000, $this->loanRequest->setDeposit(9000));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getDeposit()
     */
    public function testGetDeposit()
    {
        $this->loanRequest->setDeposit(9000);
        $this->assertEquals(9000, $this->loanRequest->getDeposit(9000));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::setLoanProducts()
     */
    public function testSetLoanProducts()
    {
        $this->assertEquals($this->loanProducts, $this->loanRequest->setLoanProducts($this->loanProducts));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::getLoanProducts()
     */
    public function testGetLoanProducts()
    {
        $this->loanRequest->setLoanProducts($this->loanProducts);
        $this->assertEquals($this->loanProducts, $this->loanRequest->getLoanProducts($this->loanProducts));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\LoanRequest\Entity\LoanRequestAbstract::toArray()
     */
    public function testToArray()
    {
        $requestDate = Carbon::yesterday();
        $validityDate = Carbon::tomorrow();
        $additionalData = new AdditionalData();
        $fulfilmentObject = new FulfilmentObject();
        $loanProducts = ["LOAN_PRODUCT"];

        $expected = [
            'id' => 123,
            'checkout_version' => "1.23",
            'checkout_type' => null, // set null, since this is only defined by subclasses.
            'merchant_installation' => "TestInstall",
            'order_description' => "OrderDescription",
            'order_reference' => "OrderReference",
            'order_amount' => 9000,
            'order_validity' => $validityDate->getTimestamp(),
            'order_extendable' => true,
            'additional_data' => $additionalData,
            'request_date' => $requestDate->getTimestamp(),
            'deposit' => 1000,
            'fulfilment_type' => 1,
            'fulfilment_object' => $fulfilmentObject,
            'loan_products' => $loanProducts
        ];

        $this->loanRequest->setId($expected["id"]);
        $this->loanRequest->setCheckoutVersion($expected["checkout_version"]);
        $this->loanRequest->setMerchantInstallation($expected["merchant_installation"]);
        $this->loanRequest->setOrderDescription($expected["order_description"]);
        $this->loanRequest->setOrderReference($expected["order_reference"]);
        $this->loanRequest->setOrderAmount($expected["order_amount"]);
        $this->loanRequest->setOrderValidity($validityDate);
        $this->loanRequest->setOrderExtendable($expected["order_extendable"]);
        $this->loanRequest->setAdditionalData($expected["additional_data"]);
        $this->loanRequest->setRequestDate($requestDate);
        $this->loanRequest->setDeposit($expected["deposit"]);
        $this->loanRequest->setFulfilmentType($expected["fulfilment_type"]);
        $this->loanRequest->setFulfilmentObject($expected["fulfilment_object"]);
        $this->loanRequest->setLoanProducts($expected["loan_products"]);

        $this->assertEquals($expected, $this->loanRequest->toArray());
    }

    private function d($string)
    {
        file_put_contents("debug.log", $string."\n", FILE_APPEND);
    }
}
