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

    protected function setUp()
    {
        $this->customer = new \PayBreak\Sdk\CustomType\RequestCustomer();
    }

    protected function tearDown()
    {
        $this->customer = null;
    }

    public function testSetDob()
    {
        $this->assertSame(self::DOB, $this->customer->setDob(self::DOB));
    }

    public function testGetDob()
    {
        $this->customer->setDob(self::DOB);
        $this->assertSame(self::DOB, $this->customer->getDob());
    }

    public function testSetFirstName()
    {
        $this->assertSame(self::FIRST_NAME, $this->customer->setFirstName(self::FIRST_NAME));
    }

    public function testGetFirstName()
    {
        $this->customer->setFirstName(self::FIRST_NAME);
        $this->assertSame(self::FIRST_NAME, $this->customer->getFirstName());
    }

    public function testSetLastName()
    {
        $this->assertSame(self::LAST_NAME, $this->customer->setLastName(self::LAST_NAME));
    }

    public function testGetLastName()
    {
        $this->customer->setLastName(self::LAST_NAME);
        $this->assertSame(self::LAST_NAME, $this->customer->getLastName());
    }

    public function testSetEmail()
    {
        $this->assertSame(self::EMAIL, $this->customer->setEmail(self::EMAIL));
    }

    public function testGetEmail()
    {
        $this->customer->setEmail(self::EMAIL);
        $this->assertSame(self::EMAIL, $this->customer->getEmail());
    }

    public function testSetPhoneMobile()
    {
        $this->assertSame(self::PHONE_MOBILE, $this->customer->setPhoneMobile(self::PHONE_MOBILE));
    }

    public function testGetPhoneMobile()
    {
        $this->customer->setPhoneMobile(self::PHONE_MOBILE);
        $this->assertSame(self::PHONE_MOBILE, $this->customer->getPhoneMobile());
    }

    public function testSetPhonePersonal()
    {
        $this->assertSame(self::PHONE_PERSONAL, $this->customer->setPhonePersonal(self::PHONE_PERSONAL));
    }

    public function testGetPhonePersonal()
    {
        $this->customer->setPhonePersonal(self::PHONE_PERSONAL);
        $this->assertSame(self::PHONE_PERSONAL, $this->customer->getPhonePersonal());
    }

    public function testToArray()
    {
        $this->customer->setFirstName(self::FIRST_NAME);
        $this->customer->setLastName(self::LAST_NAME);
        $this->customer->setEmail(self::EMAIL);

        $this->assertEquals(
            [
                'first_name' => self::FIRST_NAME,
                'last_name'  => self::LAST_NAME,
                'email'      => self::EMAIL
            ],
            $this->customer->toArray()
        );
    }

    private function d($string)
    {
        file_put_contents("debug.log", $string."\n", FILE_APPEND);
    }

} 