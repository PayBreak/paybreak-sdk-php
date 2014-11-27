<?php

use \PayBreak\Sdk\CustomType\RequestCustomer;

/**
 * Test setters and getters for each of the 6 fields in the RequestCustomer class.
 * @author Matthew Norris
 */
namespace PayBreak\Sdk\Tests;

class RequestCustomerTest extends TestCase {

    private $customer;

    const DOB = "1984-01-01";
    const FIRST_NAME = "John";
    const LAST_NAME = "Smith";
    const EMAIL = "johnsmith@example.com";
    const PHONE_MOBILE = "07654321321";
    const PHONE_PERSONAL = "01234567890";
    const POSTCODE = "A1 B23";

    protected function setUp()
    {
        $this->customer = new \PayBreak\Sdk\CustomType\RequestCustomer();
    }

    protected function tearDown()
    {
        $this->customer = null;
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::setDob()
     */
    public function testSetDob()
    {
        $this->assertSame(self::DOB, $this->customer->setDob(self::DOB));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::getDob()
     */
    public function testGetDob()
    {
        $this->customer->setDob(self::DOB);
        $this->assertSame(self::DOB, $this->customer->getDob());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::setFirstName()
     */
    public function testSetFirstName()
    {
        $this->assertSame(self::FIRST_NAME, $this->customer->setFirstName(self::FIRST_NAME));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::getFirstName()
     */
    public function testGetFirstName()
    {
        $this->customer->setFirstName(self::FIRST_NAME);
        $this->assertSame(self::FIRST_NAME, $this->customer->getFirstName());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::setLastName()
     */
    public function testSetLastName()
    {
        $this->assertSame(self::LAST_NAME, $this->customer->setLastName(self::LAST_NAME));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::getLastName()
     */
    public function testGetLastName()
    {
        $this->customer->setLastName(self::LAST_NAME);
        $this->assertSame(self::LAST_NAME, $this->customer->getLastName());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::setEmail()
     */
    public function testSetEmail()
    {
        $this->assertSame(self::EMAIL, $this->customer->setEmail(self::EMAIL));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::getEmail()
     */
    public function testGetEmail()
    {
        $this->customer->setEmail(self::EMAIL);
        $this->assertSame(self::EMAIL, $this->customer->getEmail());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::setPhoneMobile()
     */
    public function testSetPhoneMobile()
    {
        $this->assertSame(self::PHONE_MOBILE, $this->customer->setPhoneMobile(self::PHONE_MOBILE));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::getPhoneMobile()
     */
    public function testGetPhoneMobile()
    {
        $this->customer->setPhoneMobile(self::PHONE_MOBILE);
        $this->assertSame(self::PHONE_MOBILE, $this->customer->getPhoneMobile());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::setPhonePersonal()
     */
    public function testSetPhonePersonal()
    {
        $this->assertSame(self::PHONE_PERSONAL, $this->customer->setPhonePersonal(self::PHONE_PERSONAL));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::getPhonePersonal()
     */
    public function testGetPhonePersonal()
    {
        $this->customer->setPhonePersonal(self::PHONE_PERSONAL);
        $this->assertSame(self::PHONE_PERSONAL, $this->customer->getPhonePersonal());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::setPostcode()
     */
    public function testSetPostcode()
    {
        $this->assertSame(self::POSTCODE, $this->customer->setPostcode(self::POSTCODE));
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::getPostcode()
     */
    public function testGetPostcode()
    {
        $this->customer->setPostcode(self::POSTCODE);
        $this->assertSame(self::POSTCODE, $this->customer->getPostcode());
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\CustomType\RequestCustomer::toArray()
     */
    public function testToArray()
    {
        $this->customer->setDob(self::DOB);
        $this->customer->setFirstName(self::FIRST_NAME);
        $this->customer->setLastName(self::LAST_NAME);
        $this->customer->setEmail(self::EMAIL);
        $this->customer->setPhoneMobile(self::PHONE_MOBILE);
        $this->customer->setPhonePersonal(self::PHONE_PERSONAL);
        $this->customer->setPostcode(self::POSTCODE);

        $this->assertEquals(
            [
                'dob'               => self::DOB,
                'firstName'         => self::FIRST_NAME,
                'lastName'          => self::LAST_NAME,
                'email'             => self::EMAIL,
                'phoneMobile'       => self::PHONE_MOBILE,
                'phonePersonal'     => self::PHONE_PERSONAL,
                'postcode'          => self::POSTCODE
            ],
            $this->customer->toArray()
        );
    }

    private function d($string)
    {
        file_put_contents("debug.log", $string."\n", FILE_APPEND);
    }

}
