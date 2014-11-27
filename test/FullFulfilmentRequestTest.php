<?php

namespace PayBreak\Sdk\Tests;

use PayBreak\Sdk\FulfilmentRequest\Entity\FulfilmentRequestInterface;
use PayBreak\Sdk\FulfilmentRequest\Entity\FullFulfilmentRequest;

/**
 * Class FullFulfilmentRequestTest
 *
 * @author WN
 * @package PayBreak\Sdk\Tests
 */
class FullFulfilmentRequestTest extends TestCase
{
    /**
     * @covers Graham\FulfilmentRequest\Entity\FullFulfilmentRequest::__construct()
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('PayBreak\Sdk\FulfilmentRequest\Entity\FulfilmentRequestInterface', new FullFulfilmentRequest());
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
