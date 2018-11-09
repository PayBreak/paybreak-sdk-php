<?php

namespace PayBreak\Sdk\Test\Gateways;

use PayBreak\Sdk\ApiClient\ApiClientFactoryInterface;
use PayBreak\Sdk\ApiClient\ProviderApiClient;
use PayBreak\Sdk\Entities\ProductEntity;
use PayBreak\Sdk\Gateways\ProductGateway;

/**
 * Product Gateway Test
 *
 * @author GK
 */
class ProductGatewayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @author GK
     */
    public function testInstance()
    {
        /** @var ApiClientFactoryInterface $mockApiClientFactory */
        $mockApiClientFactory = $this->getMock(ApiClientFactoryInterface::class);

        $this->assertInstanceOf(
            ProductGateway::class,
            new ProductGateway($mockApiClientFactory)
        );
    }

    /**
     * @author GK
     */
    public function testGetProduct()
    {
        $token = 'token';
        $product = 4;
        $expectedResponse = [
            'id' => $product,
        ];

        $mockApiClient = $this->getMock(ProviderApiClient::class);
        $mockApiClient->expects($this->any())->method('get')
            ->with(
                '/v4/installations/1/products/' . $product,
                []
            )->willReturn($expectedResponse);

        $mockApiClientFactory = $this->getMock(ApiClientFactoryInterface::class);
        $mockApiClientFactory->expects($this->any())->method('makeApiClient')
            ->with($token)
            ->willReturn($mockApiClient);

        $productGateway = new ProductGateway($mockApiClientFactory);

        $result = $productGateway->getProduct(
            '1',
            $product,
            $token
        );

        $this->assertInstanceOf(ProductEntity::class, $result);
        $this->assertEquals($product, $result->getId());
    }
}
