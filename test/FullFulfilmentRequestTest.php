<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\Tests;

use Graham\FulfilmentRequest\Entity\FulfilmentRequestInterface;
use Graham\FulfilmentRequest\Entity\FullFulfilmentRequest;

/**
 * Class FullFulfilmentRequestTest
 *
 * @author WN
 * @package Graham\Tests
 */
class FullFulfilmentRequestTest extends TestCase
{
    /**
     * @covers Graham\FulfilmentRequest\Entity\FullFulfilmentRequest::__construct()
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('Graham\FulfilmentRequest\Entity\FulfilmentRequestInterface', new FullFulfilmentRequest());
    }

    /**
     * @covers Graham\FulfilmentRequest\Entity\FullFulfilmentRequest::getFulfilmentType()
     */
    public function testGetFulfilmentType()
    {
        $fulfilmentRequest = new FullFulfilmentRequest();

        $this->assertSame(FulfilmentRequestInterface::TYPE_FULL, $fulfilmentRequest->getFulfilmentType());
    }
}