<?php


namespace PayBreak\Sdk\Tests;

use PayBreak\Sdk\CustomType\OrderItem;
use PayBreak\Sdk\LoanRequest\Entity\ExtendedLoanRequest;
use Carbon\Carbon;

/**
 * Class ExtendedLoanRequestTest - unit test for ExtendedLoanRequest
 * @package PayBreak\Sdk\Tests
 * @author Matthew Norris
 */

class ExtendedLoanRequestTest extends TestCase
{

    /**
     * @var ExtendedLoanRequest
     */
    private $loanRequest;

    /**
     * @author Matthew Norris
     */
    protected function setUp()
    {
        date_default_timezone_set('Europe/London');
        $this->d("setUp() invoked");
        $this->loanRequest = new ExtendedLoanRequest();
    }

    /**
     * @author Matthew Norris
     */
    protected function tearDown()
    {
        $this->loanRequest = null;
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\ExtendedLoanRequest::getCheckoutType()
     */
    public function testGetCheckoutType()
    {
        $this->assertEquals(ExtendedLoanRequest::TYPE_EXTENDED, $this->loanRequest->getCheckoutType());
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\ExtendedLoanRequest::getOrderAmount()
     */
    public function testAddOrderItem()
    {
        $expectedItems = $this->addTestOrderItems();
        $this->assertEquals(5000, $this->loanRequest->getOrderAmount());
        $this->assertEquals($expectedItems, $this->loanRequest->getOrderItems());
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\ExtendedLoanRequest::toArray()
     */
    public function testToArray()
    {
        // for array, we just need to test whether the order items are there
        // ... since the rest of the fields are tested by the Abstract unit test
        $expectedItems = $this->addTestOrderItems();
        $expectedArray = [];
        foreach ($expectedItems as $expectedItem) {
            $expectedArray[$expectedItem->getSku()] = $expectedItem->toArray();
        }

        // must set the timestamp fields though, because otherwise there will be an exception
        $this->loanRequest->setOrderValidity(Carbon::tomorrow());
        $this->loanRequest->setRequestDate(Carbon::yesterday());

        $this->assertEquals($expectedArray, $this->loanRequest->toArray()["order_items"]);
    }

    /**
     * Helper
     * @author Matthew Norris
     * @return array
     */
    private function addTestOrderItems()
    {
        $expectedItems = [];

        // Add an item that costs £10 and has quantity 2
        $item = new OrderItem();
        $item->setSku("TEST_SKU_1");
        $item->setPrice(1000);
        $item->setQuantity(2);
        $item->setDescription("Test description 1");
        $item->setFulfillable(true);
        $item->setGtin("001234");
        $expectedItems["TEST_SKU_1"] = $item;
        $this->loanRequest->addOrderItem($item);

        // Add another item, price £30 and quantity 1
        $item = new OrderItem();
        $item->setSku("TEST_SKU_2");
        $item->setPrice(3000);
        $item->setQuantity(1);
        $item->setDescription("Test description 2");
        $item->setFulfillable(true);
        $item->setGtin("002345");
        $expectedItems["TEST_SKU_2"] = $item;
        $this->loanRequest->addOrderItem($item);

        return $expectedItems;
    }
}