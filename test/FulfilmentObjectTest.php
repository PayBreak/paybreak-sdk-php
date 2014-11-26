<?php
/**
 * Created by PhpStorm.
 * User: matthewnorris
 * Date: 25/11/14
 * Time: 14:10
 */

namespace PayBreak\Sdk\Tests;


class FulfilmentObjectTest extends TestCase {

    private $fulfilmentObject;

    const POSTCODE = "A1 B23";
    const ADDRESS = "1 Test Street,\nTest City,\nUK";
    const REFERENCE = "CollectionReferenceNumber";

    protected function setUp()
    {
        $this->fulfilmentObject = new \PayBreak\Sdk\LoanRequest\Entity\FulfilmentObject();
    }

    protected function tearDown()
    {
        $this->fulfilmentObject = null;
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\FulfilmentObject::setPostcode()
     */
    public function testSetPostcode()
    {
        $this->assertSame(self::POSTCODE, $this->fulfilmentObject->setPostcode(self::POSTCODE));
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\FulfilmentObject::getPostcode()
     */
    public function testGetPostcode()
    {
        $this->fulfilmentObject->setPostcode(self::POSTCODE);
        $this->assertSame(self::POSTCODE, $this->fulfilmentObject->getPostcode());
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\FulfilmentObject::setAddress()
     */
    public function testSetAddress()
    {
        $this->assertSame(self::ADDRESS, $this->fulfilmentObject->setAddress(self::ADDRESS));
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\FulfilmentObject::getAddress()
     */
    public function testGetAddress()
    {
        $this->fulfilmentObject->setAddress(self::ADDRESS);
        $this->assertSame(self::ADDRESS, $this->fulfilmentObject->getAddress());
    }


    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\FulfilmentObject::setReference()
     */
    public function testSetReference()
    {
        $this->assertSame(self::REFERENCE, $this->fulfilmentObject->setReference(self::REFERENCE));
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\FulfilmentObject::getReference()
     */
    public function testGetReference()
    {
        $this->fulfilmentObject->setReference(self::REFERENCE);
        $this->assertSame(self::REFERENCE, $this->fulfilmentObject->getReference());
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\FulfilmentObject::toArray()
     */
    public function testToArray()
    {
        $this->fulfilmentObject->setPostcode(self::POSTCODE);
        $this->fulfilmentObject->setAddress(self::ADDRESS);
        $this->fulfilmentObject->setReference(self::REFERENCE);

        $array = $this->fulfilmentObject->toArray();

        $this->assertEquals(
            [
                "postcode" => self::POSTCODE,
                "address" => self::ADDRESS,
                "reference" => self::REFERENCE,
            ],
            $array
        );
    }

    private function d($string)
    {
        file_put_contents("debug.log", $string."\n", FILE_APPEND);
    }
}