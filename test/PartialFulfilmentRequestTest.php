<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Tests;

use PayBreak\Sdk\FulfilmentRequest\Entity\FulfilmentRequestInterface;
use PayBreak\Sdk\FulfilmentRequest\Entity\PartialFulfilmentRequest;

/**
 * Class PartialFulfilmentRequestTest
 *
 * @author WN
 * @package PayBreak\Sdk\Tests
 */
class PartialFulfilmentRequestTest extends TestCase
{
    /**
     * @covers Graham\FulfilmentRequest\Entity\PartialFulfilmentRequest::__construct()
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('PayBreak\Sdk\FulfilmentRequest\Entity\FulfilmentRequestInterface', new PartialFulfilmentRequest());
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