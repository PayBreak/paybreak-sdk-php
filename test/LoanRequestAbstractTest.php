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

    public function testSetId()
    {
        $this->assertEquals(2, $this->loanRequest->setId(2));
    }

    public function testGetId()
    {
        $this->loanRequest->setId(3);
        $this->assertEquals(3, $this->loanRequest->getId());
    }

    public function testSetCheckoutVersion()
    {
        $this->assertEquals("1.23", $this->loanRequest->setCheckoutVersion("1.23"));
    }

    public function testGetCheckoutVersion()
    {
        $this->loanRequest->setCheckoutVersion("4.56");
        $this->assertEquals("4.56", $this->loanRequest->getCheckoutVersion());
    }

    public function testSetMerchantInstallation()
    {
        $this->assertEquals("test", $this->loanRequest->setMerchantInstallation("test"));
    }

    public function testGetMerchantInstallation()
    {
        $this->loanRequest->setMerchantInstallation("test");
        $this->assertEquals("test", $this->loanRequest->getMerchantInstallation());
    }

    public function testSetOrderDescription()
    {
        $this->assertEquals("orderDescription", $this->loanRequest->setOrderDescription("orderDescription"));
    }

    public function testGetOrderDescription()
    {
        $this->loanRequest->setOrderDescription("test");
        $this->assertEquals("test", $this->loanRequest->getOrderDescription());
    }

    public function testSetOrderReference()
    {
        $this->assertEquals("test", $this->loanRequest->setOrderReference("test"));
    }

    public function testGetOrderReference()
    {
        $this->loanRequest->setOrderReference("test");
        $this->assertEquals("test", $this->loanRequest->getOrderReference());
    }

    public function testSetOrderAmount()
    {
        $this->assertEquals(1234, $this->loanRequest->setOrderAmount(1234));
    }

    public function testGetOrderAmount()
    {
        $this->loanRequest->setOrderAmount(1234);
        $this->assertEquals(1234, $this->loanRequest->getOrderAmount());
    }

    public function testSetOrderValidity()
    {
        $date = Carbon::tomorrow();
        $this->assertEquals(Carbon::tomorrow(), $this->loanRequest->setOrderValidity($date));
    }

    public function testGetOrderValidity()
    {
        $date = Carbon::tomorrow();
        $this->loanRequest->setOrderValidity($date);
        $this->assertEquals($date, $this->loanRequest->getOrderValidity($date));
    }

    public function testSetOrderExtendable()
    {
        $this->assertEquals(true, $this->loanRequest->setOrderExtendable(true));
    }

    public function testGetOrderExtendable()
    {
        $this->loanRequest->setOrderExtendable(true);
        $this->assertEquals(true, $this->loanRequest->getOrderExtendable());
    }

    public function testSetAdditionalData()
    {
        $this->assertEquals($this->additionalData, $this->loanRequest->setAdditionalData($this->additionalData));
    }

    public function testGetAdditionalData()
    {
        $this->loanRequest->setAdditionalData($this->additionalData);
        $this->assertEquals($this->additionalData, $this->loanRequest->getAdditionalData());
    }

    public function testSetRequestDate()
    {
        $date = Carbon::yesterday();
        $this->assertEquals($date, $this->loanRequest->setRequestDate($date));
    }

    public function testGetRequestDate()
    {
        $date = Carbon::yesterday();
        $this->loanRequest->setRequestDate($date);
        $this->assertEquals($date, $this->loanRequest->getRequestDate());
    }

    public function testSetStatus()
    {
        $this->assertEquals(
            LoanRequestInterface::STATUS_PENDING,
            $this->loanRequest->setStatus(LoanRequestInterface::STATUS_PENDING)
        );
    }

    public function testGetStatus()
    {
        $this->loanRequest->setStatus(LoanRequestInterface::STATUS_PENDING);
        $this->assertEquals(LoanRequestInterface::STATUS_PENDING, $this->loanRequest->getStatus());
    }

    public function testSetFulfilled()
    {
        $this->assertEquals(
            LoanRequestInterface::FULFILLED_FULL,
            $this->loanRequest->setFulfilled(LoanRequestInterface::FULFILLED_FULL)
        );
    }

    public function testGetFulfilled()
    {
        $this->loanRequest->setFulfilled(LoanRequestInterface::FULFILLED_FULL);
        $this->assertEquals(LoanRequestInterface::FULFILLED_FULL, $this->loanRequest->getFulfilled());
    }

    public function testSetFulfilmentType()
    {
        $this->assertEquals(
            LoanRequestInterface::FULFILMENT_TYPE_ALTERNATIVE,
            $this->loanRequest->setFulfilmentType(LoanRequestInterface::FULFILMENT_TYPE_ALTERNATIVE)
        );
    }

    public function testGetFulfilmentType()
    {
        $this->loanRequest->setFulfilmentType(LoanRequestInterface::FULFILMENT_TYPE_ALTERNATIVE);
        $this->assertEquals(LoanRequestInterface::FULFILMENT_TYPE_ALTERNATIVE, $this->loanRequest->getFulfilmentType());
    }

    public function testSetFulfilmentObject()
    {
        $this->assertEquals($this->fulfilmentObject, $this->loanRequest->setFulfilmentObject($this->fulfilmentObject));
    }

    public function testGetFulfilmentObject()
    {
        $this->loanRequest->setFulfilmentObject($this->fulfilmentObject);
        $this->assertEquals($this->fulfilmentObject, $this->loanRequest->getFulfilmentObject($this->fulfilmentObject));
    }

    public function testSetDeposit()
    {
        $this->assertEquals(9000, $this->loanRequest->setDeposit(9000));
    }

    public function testGetDeposit()
    {
        $this->loanRequest->setDeposit(9000);
        $this->assertEquals(9000, $this->loanRequest->getDeposit(9000));
    }

    public function testSetLoanProducts()
    {
        $this->assertEquals($this->loanProducts, $this->loanRequest->setLoanProducts($this->loanProducts));
    }

    public function testGetLoanProducts()
    {
        $this->loanRequest->setLoanProducts($this->loanProducts);
        $this->assertEquals($this->loanProducts, $this->loanRequest->getLoanProducts($this->loanProducts));
    }

    private function d($string)
    {
        file_put_contents("debug.log", $string."\n", FILE_APPEND);
    }
}