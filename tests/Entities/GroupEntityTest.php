<?php
/*
 * This file is part of the PayBreak/basket package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Basket\Entities;
use PayBreak\Sdk\Entities\GroupEntity;
use PayBreak\Sdk\Entities\ProductEntity;
use PayBreak\Sdk\Gateways\ProductGateway;


/**
 * Installation Entity Test
 *
 * @author WN, EB
 * @package Tests\Basket\Entities
 */
class GroupEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        /** @var \PayBreak\Sdk\ApiClient\ApiClientFactoryInterface $mock */
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $this->assertInstanceOf('PayBreak\Sdk\Gateways\ProductGateway', new ProductGateway($mock));
    }

    public function testGroupEntity()
    {
        $groupEntity = GroupEntity::make([
            'id' => 'FF',
            'name' => 'Flexible Finance',
            'products' => [
                [
                    'product_group' => 'FF',
                ],
                new ProductEntity(),
            ]
        ]);

        $this->assertInstanceOf('PayBreak\Sdk\Entities\GroupEntity', $groupEntity);

    }

    public function testGroupEntityWithWrongData()
    {
        $groupEntity = GroupEntity::make([
            'SomethingElse' => 'WrongData',
            'products' => [
                'product_group' => 'FF',
                'string',
            ]
        ]);

        $this->assertInstanceOf('PayBreak\Sdk\Entities\GroupEntity', $groupEntity);
    }

    public function testGetProductGroupsWithProducts()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn([]);

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $productGateway = new ProductGateway($mock);

        $response = $productGateway->getProductGroupsWithProducts('TestInstall', 'mytoken');

        $this->assertInstanceOf('PayBreak\Sdk\Entities\GroupEntity', $response);

    }
}
