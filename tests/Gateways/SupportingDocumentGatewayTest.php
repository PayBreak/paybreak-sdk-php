<?php

namespace Tests\Basket\Gateways;

use PayBreak\Sdk\ApiClient\ApiClientFactoryInterface;
use PayBreak\Sdk\ApiClient\ProviderApiClient;
use PayBreak\Sdk\Gateways\SupportingDocumentGateway;

/**
 * Supporting Document Gateway Test
 *
 * @author EB
 */
class SupportingDocumentGatewayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @author EB
     */
    public function testInstance()
    {
        /** @var \PayBreak\Sdk\ApiClient\ApiClientFactoryInterface $mock */
        $mock = $this->getMock(ApiClientFactoryInterface::class);

        $this->assertInstanceOf(SupportingDocumentGateway::class, new SupportingDocumentGateway($mock));
    }

    /**
     * @author EB
     */
    public function testAddDocument()
    {
        $mockApiClient = $this->getMock(ProviderApiClient::class);

        $expected = [];

        $mockApiClient->expects($this->any())->method('post')->willReturn($expected);

        $mock = $this->getMock(ApiClientFactoryInterface::class);

        $mock->expects($this->once())->method('makeApiClient')->willReturn($mockApiClient);

        $documentGateway = new SupportingDocumentGateway($mock);

        $this->assertEquals($expected, $documentGateway->addDocument('abc', 'test', '12345', '1', '1', '1'));
    }
}
