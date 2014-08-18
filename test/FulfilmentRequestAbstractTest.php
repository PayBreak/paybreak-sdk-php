<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Tests;

/**
 * Class FulfilmentRequestAbstractTest
 *
 * @author WN
 * @package PayBreak\Sdk\Tests
 */
class FulfilmentRequestAbstractTest extends TestCase
{
    /**
     * @var \PayBreak\Sdk\FulfilmentRequest\Entity\FulfilmentRequestAbstract
     */
    protected $mockObject;

    protected function setUp()
    {
        $this->mockObject = $this->getMockForAbstractClass('PayBreak\Sdk\FulfilmentRequest\Entity\FulfilmentRequestAbstract');
    }

    protected function tearDown()
    {
        $this->mockObject = NULL;
    }

    /**
     * @covers Graham\FulfilmentRequest\Entity\FulfilmentRequestAbstract::getId()
     */
    public function testSetId()
    {
        $this->assertSame(123, $this->mockObject->setId(123));
    }

    /**
     * @covers Graham\FulfilmentRequest\Entity\FulfilmentRequestAbstract::setId()
     */
    public function testGetId()
    {
        $this->mockObject->setId(456);

        $this->assertSame(456, $this->mockObject->getId());
    }
}
