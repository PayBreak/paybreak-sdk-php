<?php

namespace Tests\Basket\Gateways;

use PayBreak\Sdk\ApiClient\ApiClientFactoryInterface;
use PayBreak\Sdk\ApiClient\ProviderApiClient;
use PayBreak\Sdk\Gateways\CustomerIntelligenceGateway;

/**
 * Customer Intelligence Gateway Test
 *
 * @author GK
 * @package Tests\Basket\Gateways
 */
class CustomerIntelligenceGatewayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @author GK
     */
    public function testInstance()
    {
        /** @var ApiClientFactoryInterface $mockApiClientFactory */
        $mockApiClientFactory = $this->getMock(ApiClientFactoryInterface::class);

        $this->assertInstanceOf(
            CustomerIntelligenceGateway::class,
            new CustomerIntelligenceGateway($mockApiClientFactory)
        );
    }

    /**
     * @author GK
     */
    public function testListLeadScores()
    {
        $limit = 10;
        $offset = 4;
        $token = 'token';
        $expectedResponse = [
            'Api response'
        ];

        $mockApiClient = $this->getMock(ProviderApiClient::class);
        $mockApiClient->expects($this->any())->method('get')
            ->with(
                '/v4/installations/1/lead-score?offset=' . $offset . '&limit=' . $limit,
                []
            )->willReturn($expectedResponse);

        $mockApiClientFactory = $this->getMock(ApiClientFactoryInterface::class);
        $mockApiClientFactory->expects($this->any())->method('makeApiClient')
            ->with($token)
            ->willReturn($mockApiClient);

        $customerIntelligenceGateway = new CustomerIntelligenceGateway($mockApiClientFactory);

        $result = $customerIntelligenceGateway->listLeadScores(
            '1',
            $token,
            $offset,
            $limit
        );

        $this->assertEquals($expectedResponse, $result);
    }

    /**
     * @author GK
     */
    public function testListPreApprovals()
    {
        $limit = 10;
        $offset = 4;
        $token = 'token';
        $expectedResponse = [
            'Api response'
        ];

        $mockApiClient = $this->getMock(ProviderApiClient::class);
        $mockApiClient->expects($this->any())->method('get')
            ->with(
                '/v4/installations/1/pre-approval?offset=' . $offset . '&limit=' . $limit,
                []
            )->willReturn($expectedResponse);

        $mockApiClientFactory = $this->getMock(ApiClientFactoryInterface::class);
        $mockApiClientFactory->expects($this->any())->method('makeApiClient')
            ->with($token)
            ->willReturn($mockApiClient);

        $customerIntelligenceGateway = new CustomerIntelligenceGateway($mockApiClientFactory);

        $result = $customerIntelligenceGateway->listPreApprovals(
            '1',
            $token,
            $offset,
            $limit
        );

        $this->assertEquals($expectedResponse, $result);
    }

    /**
     * @author GK
     */
    public function testPerformLeadScore()
    {
        $token = 'token';
        $expectedResponse = [
            'Api response'
        ];
        $requestBody = [
            'request body'
        ];

        $mockApiClient = $this->getMock(ProviderApiClient::class);
        $mockApiClient->expects($this->any())->method('post')
            ->with(
                '/v4/installations/1/lead-score',
                $requestBody,
                []
            )->willReturn($expectedResponse);

        $mockApiClientFactory = $this->getMock(ApiClientFactoryInterface::class);
        $mockApiClientFactory->expects($this->any())->method('makeApiClient')
            ->with($token)
            ->willReturn($mockApiClient);

        $customerIntelligenceGateway = new CustomerIntelligenceGateway($mockApiClientFactory);

        $result = $customerIntelligenceGateway->performLeadScore(
            '1',
            $requestBody,
            $token
        );

        $this->assertEquals($expectedResponse, $result);
    }

    /**
     * @author GK
     */
    public function testPerformPreApproval()
    {
        $token = 'token';
        $expectedResponse = [
            'Api response'
        ];
        $requestBody = [
            'request body'
        ];

        $mockApiClient = $this->getMock(ProviderApiClient::class);
        $mockApiClient->expects($this->any())->method('post')
            ->with(
                '/v4/installations/1/pre-approval',
                $requestBody,
                []
            )->willReturn($expectedResponse);

        $mockApiClientFactory = $this->getMock(ApiClientFactoryInterface::class);
        $mockApiClientFactory->expects($this->any())->method('makeApiClient')
            ->with($token)
            ->willReturn($mockApiClient);

        $customerIntelligenceGateway = new CustomerIntelligenceGateway($mockApiClientFactory);

        $result = $customerIntelligenceGateway->performPreApproval(
            '1',
            $requestBody,
            $token
        );

        $this->assertEquals($expectedResponse, $result);
    }
}
