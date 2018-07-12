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
 * Group Entity Test
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

    public function testMakeEmpty()
    {
        $this->assertInstanceOf('WNowicki\Generic\Contracts\Entity', GroupEntity::make([]));
        $this->assertInstanceOf('PayBreak\Sdk\Entities\GroupEntity', GroupEntity::make([]));
    }

    public function testToArray()
    {
        $this->assertInternalType('array', GroupEntity::make([])->toArray());
    }

    public function testSetId()
    {
        $entity = new GroupEntity();

        $this->assertInstanceOf('PayBreak\Sdk\Entities\GroupEntity', $entity->setId('BNPL'));
    }

    public function testGetId()
    {
        $entity = new GroupEntity();

        $entity->setId('BNPL');

        $this->assertSame('BNPL', $entity->getId());
    }

    public function testSetName()
    {
        $entity = new GroupEntity();

        $this->assertInstanceOf('PayBreak\Sdk\Entities\GroupEntity', $entity->setName('Buy Now Pay Later'));
    }

    public function testGetName()
    {
        $entity = new GroupEntity();

        $entity->setName('Buy Now Pay Later');

        $this->assertSame('Buy Now Pay Later', $entity->getName());
    }

    public function testProducts()
    {
        $entity = new GroupEntity();

        $products = $entity->getProducts();

        $products[0] = new ProductEntity();

        $this->assertInstanceOf('PayBreak\Sdk\Entities\ProductEntity', $products[0]);
    }

    public function testSetProductsName()
    {
        $entity = new GroupEntity();

        $products = $entity->getProducts();

        $products[0] = new ProductEntity();

        $this->assertInstanceOf('PayBreak\Sdk\Entities\ProductEntity', $products[0]->setName('Buy Now Pay Later'));
    }

    public function testGetProductsName()
    {
        $entity = new GroupEntity();

        $products = $entity->getProducts();

        $products[0] = new ProductEntity();

        $products[0]->setName('Buy Now Pay Later');

        $this->assertSame('Buy Now Pay Later', $products[0]->getName());
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

        $this->assertInternalType('array', $response);
    }
}
