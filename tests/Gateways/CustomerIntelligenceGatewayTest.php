<?php
/*
 * This file is part of the PayBreak/basket package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Basket\Gateways;

use PayBreak\Sdk\ApiClient\ApiClientFactoryInterface;
use PayBreak\Sdk\ApiClient\ProviderApiClient;
use PayBreak\Sdk\Entities\InstallationEntity;
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
    public function testGetLeadScore()
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

        $mockInstallationEntity = $this->getMock(InstallationEntity::class);
        $mockInstallationEntity->expects($this->any())->method('__call')
            ->with('getId')->willReturn(1);

        $customerIntelligenceGateway = new CustomerIntelligenceGateway($mockApiClientFactory);

        $result = $customerIntelligenceGateway->performLeadScore(
            $mockInstallationEntity,
            $requestBody,
            $token
        );

        $this->assertEquals($expectedResponse, $result);
    }
}
