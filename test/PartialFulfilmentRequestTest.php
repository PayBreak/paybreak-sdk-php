<?php

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
