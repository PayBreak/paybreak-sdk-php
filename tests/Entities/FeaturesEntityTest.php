<?php
/*
 * This file is part of the PayBreak/paybreak-sdk-php package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Basket\Entities;

use PayBreak\Sdk\Entities\Installation\FeaturesEntity;

/**
 * Features Entity Test
 *
 * @author EA
 * @package Tests\Basket\Entities
 */
class FeaturesEntityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @author EA
     */
    public function testInstance()
    {
        $entity = new FeaturesEntity();

        $this->assertInstanceOf('WNowicki\Generic\Contracts\Entity', $entity);
        $this->assertInstanceOf('PayBreak\Sdk\Entities\Installation\FeaturesEntity', $entity);
    }

    /**
     * @author EA
     */
    public function testMakeEmpty()
    {
        $fulfilmentEntity = FeaturesEntity::make([]);
        
        $this->assertInstanceOf('WNowicki\Generic\Contracts\Entity', $fulfilmentEntity);
        $this->assertInstanceOf('PayBreak\Sdk\Entities\Installation\FeaturesEntity', $fulfilmentEntity);
    }

    /**
     * @author EA
     */
    public function testToArray()
    {
        $this->assertInternalType('array', FeaturesEntity::make([])->toArray());
    }

    /**
     * @author EA
     */
    public function testSetMerchantLiable()
    {
        $entity = new FeaturesEntity();

        $this->assertInstanceOf('PayBreak\Sdk\Entities\Installation\FeaturesEntity', $entity->setMerchantLiable(true));
    }

    /**
     * @author EA
     */
    public function testGetMerchantLiable()
    {
        $entity = new FeaturesEntity();

        $entity->setMerchantLiable(true);

        $this->assertSame(true, $entity->getMerchantLiable());
    }

    /**
     * @author EA
     */
    public function testSetCollectFulfilment()
    {
        $entity = new FeaturesEntity();

        $this->assertInstanceOf('PayBreak\Sdk\Entities\Installation\FeaturesEntity', $entity->setCollectFulfilment(true));
    }

    /**
     * @author EA
     */
    public function testGetCollectFulfilment()
    {
        $entity = new FeaturesEntity();

        $entity->setCollectFulfilment(false);

        $this->assertSame(false, $entity->getCollectFulfilment());
    }

    /**
     * @author EB
     */
    public function testSetUploadDocuments()
    {
        $entity = new FeaturesEntity();

        $this->assertInstanceOf('PayBreak\Sdk\Entities\Installation\FeaturesEntity', $entity->setUploadDocuments(true));
    }

    /**
     * @author EB
     */
    public function testGetUploadDocuments()
    {
        $entity = new FeaturesEntity();

        $entity->setUploadDocuments(false);

        $this->assertSame(false, $entity->getUploadDocuments());
    }
}
