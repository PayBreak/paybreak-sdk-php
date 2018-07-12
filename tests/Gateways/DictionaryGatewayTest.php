<?php

namespace Tests\Basket\Gateways;

use PayBreak\Sdk\ApiClient\ApiClientFactoryInterface;
use PayBreak\Sdk\ApiClient\ProviderApiClient;
use PayBreak\Sdk\Gateways\DictionaryGateway;

/**
 * Dictionary Gateway Test
 *
 * @author EB
 */
class DictionaryGatewayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @author EB
     */
    public function testInstance()
    {
        /** @var \PayBreak\Sdk\ApiClient\ApiClientFactoryInterface $mock */
        $mock = $this->getMock(ApiClientFactoryInterface::class);

        $this->assertInstanceOf(DictionaryGateway::class, new DictionaryGateway($mock));
    }

    /**
     * @author EB
     */
    public function testGetEmploymentStatuses()
    {
        $mockApiClient = $this->getMock(ProviderApiClient::class);

        $expected = [
            'status_1',
            'status_2',
        ];

        $mockApiClient->expects($this->any())->method('get')->willReturn($expected);

        $mock = $this->getMock(ApiClientFactoryInterface::class);

        $mock->expects($this->once())->method('makeApiClient')->willReturn($mockApiClient);

        $documentGateway = new DictionaryGateway($mock);

        $this->assertEquals($expected, $documentGateway->getEmploymentStatuses('abc'));
    }

    /**
     * @author EB
     */
    public function testGetMaritalStatuses()
    {
        $mockApiClient = $this->getMock(ProviderApiClient::class);

        $expected = [
            'status_1',
            'status_2',
        ];

        $mockApiClient->expects($this->any())->method('get')->willReturn($expected);

        $mock = $this->getMock(ApiClientFactoryInterface::class);

        $mock->expects($this->once())->method('makeApiClient')->willReturn($mockApiClient);

        $documentGateway = new DictionaryGateway($mock);

        $this->assertEquals($expected, $documentGateway->getMaritalStatuses('abc'));
    }

    /**
     * @author EB
     */
    public function testGetResidentialStatuses()
    {
        $mockApiClient = $this->getMock(ProviderApiClient::class);

        $expected = [
            'status_1',
            'status_2',
        ];

        $mockApiClient->expects($this->any())->method('get')->willReturn($expected);

        $mock = $this->getMock(ApiClientFactoryInterface::class);

        $mock->expects($this->once())->method('makeApiClient')->willReturn($mockApiClient);

        $documentGateway = new DictionaryGateway($mock);

        $this->assertEquals($expected, $documentGateway->getResidentialStatuses('abc'));
    }

    /**
     * @author EB
     */
    public function testGetUploadDocumentTypes()
    {
        $mockApiClient = $this->getMock(ProviderApiClient::class);

        $expected = [
            'status_1',
            'status_2',
        ];

        $mockApiClient->expects($this->any())->method('get')->willReturn($expected);

        $mock = $this->getMock(ApiClientFactoryInterface::class);

        $mock->expects($this->once())->method('makeApiClient')->willReturn($mockApiClient);

        $documentGateway = new DictionaryGateway($mock);

        $this->assertEquals($expected, $documentGateway->getUploadDocumentTypes('abc'));
    }
}
