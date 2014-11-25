<?php

/**
 * Unit test for the OrderItem class
 * @author Matthew Norris
 */

namespace PayBreak\Sdk\Tests;

class OrderItemTest extends TestCase {

    private $orderItem;

    const SKU = "SKU_01234";
    const GTIN = "01234";
    const DESCRIPTION = "This is an order item description";
    const PRICE = 9000;
    const QUANTITY = 10;
    const FULFILLABLE = true;
    const FULFILLED = 9000; // this is an amount in pence. Not actually used by the SDK.

    protected function setUp()
    {
        $this->orderItem = new \PayBreak\Sdk\CustomType\OrderItem();
    }

    protected function tearDown()
    {
        $this->orderItem = null;
    }

    public function testSetSku()
    {
        $this->assertSame(self::SKU, $this->orderItem->setSku(self::SKU));
    }

    public function testGetSku()
    {
        $this->orderItem->setSku(self::SKU);
        $this->assertSame(self::SKU, $this->orderItem->getSku());
    }

    public function testSetGtin()
    {
        $this->assertSame(self::GTIN, $this->orderItem->setGtin(self::GTIN));
    }

    public function testGetGtin()
    {
        $this->orderItem->setGtin(self::GTIN);
        $this->assertSame(self::GTIN, $this->orderItem->getGtin());
    }

    public function testSetDescription()
    {
        $this->assertSame(self::DESCRIPTION, $this->orderItem->setDescription(self::DESCRIPTION));
    }

    public function testGetDescription()
    {
        $this->orderItem->setDescription(self::DESCRIPTION);
        $this->assertSame(self::DESCRIPTION, $this->orderItem->getDescription());
    }

    public function testSetPrice()
    {
        $this->assertSame(self::PRICE, $this->orderItem->setPrice(self::PRICE));
    }

    public function testGetPrice()
    {
        $this->orderItem->setPrice(self::PRICE);
        $this->assertSame(self::PRICE, $this->orderItem->getPrice());
    }

    public function testSetQuantity()
    {
        $this->assertSame(self::QUANTITY, $this->orderItem->setQuantity(self::QUANTITY));
    }

    public function testGetQuantity()
    {
        $this->orderItem->setQuantity(self::QUANTITY);
        $this->assertSame(self::QUANTITY, $this->orderItem->getQuantity());
    }

    public function testSetFulfillable()
    {
        $this->assertSame(self::FULFILLABLE, $this->orderItem->setFulfillable(self::FULFILLABLE));
    }

    public function testGetFulfillable()
    {
        $this->orderItem->setFulfillable(self::FULFILLABLE);
        $this->assertSame(self::FULFILLABLE, $this->orderItem->getFulfillable());
    }

    public function testSetFulfilled()
    {
        $this->assertSame(self::FULFILLED, $this->orderItem->setFulfilled(self::FULFILLED));
    }

    public function testGetFulfilled()
    {
        $this->orderItem->setFulfilled(self::FULFILLED);
        $this->assertSame(self::FULFILLED, $this->orderItem->getFulfilled());
    }

    public function testToArray()
    {
        $this->orderItem->setSku(self::SKU);
        $this->orderItem->setGtin(self::GTIN);
        $this->orderItem->setDescription(self::DESCRIPTION);
        $this->orderItem->setPrice(self::PRICE);
        $this->orderItem->setQuantity(self::QUANTITY);
        $this->orderItem->setFulfillable(self::FULFILLABLE);
        $this->orderItem->setFulfilled(self::FULFILLED);

        $this->assertEquals(
            [
                "sku" => self::SKU,
                "gtin" => self::GTIN,
                "description" => self::DESCRIPTION,
                "price" => self::PRICE,
                "quantity" => self::QUANTITY,
                "fulfillable" => self::FULFILLABLE,
                "fulfilled" => self::FULFILLED
            ],
            $this->orderItem->toArray()
        );
    }

} 