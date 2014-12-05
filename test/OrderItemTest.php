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

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::setSku()
     */
    public function testSetSku()
    {
        $this->assertSame(self::SKU, $this->orderItem->setSku(self::SKU));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::getSku()
     */
    public function testGetSku()
    {
        $this->orderItem->setSku(self::SKU);
        $this->assertSame(self::SKU, $this->orderItem->getSku());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::setGtin()
     */
    public function testSetGtin()
    {
        $this->assertSame(self::GTIN, $this->orderItem->setGtin(self::GTIN));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::getGtin()
     */
    public function testGetGtin()
    {
        $this->orderItem->setGtin(self::GTIN);
        $this->assertSame(self::GTIN, $this->orderItem->getGtin());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::setDescription()
     */
    public function testSetDescription()
    {
        $this->assertSame(self::DESCRIPTION, $this->orderItem->setDescription(self::DESCRIPTION));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::getDescription()
     */
    public function testGetDescription()
    {
        $this->orderItem->setDescription(self::DESCRIPTION);
        $this->assertSame(self::DESCRIPTION, $this->orderItem->getDescription());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::setPrice()
     */
    public function testSetPrice()
    {
        $this->assertSame(self::PRICE, $this->orderItem->setPrice(self::PRICE));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::getPrice()
     */
    public function testGetPrice()
    {
        $this->orderItem->setPrice(self::PRICE);
        $this->assertSame(self::PRICE, $this->orderItem->getPrice());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::setQuantity()
     */
    public function testSetQuantity()
    {
        $this->assertSame(self::QUANTITY, $this->orderItem->setQuantity(self::QUANTITY));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::getQuantity()
     */
    public function testGetQuantity()
    {
        $this->orderItem->setQuantity(self::QUANTITY);
        $this->assertSame(self::QUANTITY, $this->orderItem->getQuantity());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::setFulfillable()
     */
    public function testSetFulfillable()
    {
        $this->assertSame(self::FULFILLABLE, $this->orderItem->setFulfillable(self::FULFILLABLE));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::getFulfillable()
     */
    public function testGetFulfillable()
    {
        $this->orderItem->setFulfillable(self::FULFILLABLE);
        $this->assertSame(self::FULFILLABLE, $this->orderItem->getFulfillable());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::setFulfilled()
     */
    public function testSetFulfilled()
    {
        $this->assertSame(self::FULFILLED, $this->orderItem->setFulfilled(self::FULFILLED));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::getFulfilled()
     */
    public function testGetFulfilled()
    {
        $this->orderItem->setFulfilled(self::FULFILLED);
        $this->assertSame(self::FULFILLED, $this->orderItem->getFulfilled());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\OrderItem::toArray()
     */
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
