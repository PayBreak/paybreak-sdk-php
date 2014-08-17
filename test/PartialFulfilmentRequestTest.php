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
use Graham\FulfilmentRequest\Entity\PartialFulfilmentRequest;

/**
 * Class PartialFulfilmentRequestTest
 *
 * @author WN
 * @package Graham\Tests
 */
class PartialFulfilmentRequestTest extends TestCase
{
    /**
     * @covers Graham\FulfilmentRequest\Entity\PartialFulfilmentRequest::__construct()
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('Graham\FulfilmentRequest\Entity\FulfilmentRequestInterface', new PartialFulfilmentRequest());
    }

    /**
     * @covers Graham\FulfilmentRequest\Entity\PartialFulfilmentRequest::getFulfilmentType()
     */
    public function testGetFulfilmentType()
    {
        $fulfilmentRequest = new PartialFulfilmentRequest();

        $this->assertSame(FulfilmentRequestInterface::TYPE_PARTIAL, $fulfilmentRequest->getFulfilmentType());
    }
}