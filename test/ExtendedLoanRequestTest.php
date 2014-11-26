<?php
/**
 * Created by PhpStorm.
 * User: matthewnorris
 * Date: 26/11/14
 * Time: 10:04
 */

namespace PayBreak\Sdk\Tests;

use PayBreak\Sdk\CustomType\OrderItem;
use PayBreak\Sdk\LoanRequest\Entity\ExtendedLoanRequest;

class ExtendedLoanRequestTest extends TestCase {

    protected function setUp()
    {
        $this->loanRequest = new ExtendedLoanRequest();
    }

    protected function tearDown()
    {
        $this->loanRequest = null;
    }

    public function testGetCheckoutType()
    {
        $this->assertEquals(ExtendedLoanRequest::TYPE_EXTENDED, $this->loanRequest->getCheckoutType());
    }

    public function testAddOrderItem()
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

        $this->assertEquals(5000, $this->loanRequest->getOrderAmount());
        $this->assertEquals($expectedItems, $this->loanRequest->getOrderItems());
    }
}
