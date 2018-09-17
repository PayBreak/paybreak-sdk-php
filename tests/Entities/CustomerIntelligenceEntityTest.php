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

use PayBreak\Sdk\Entities\Application\CustomerIntelligenceEntity;

/**
 * Customer Intelligence Entity Test
 *
 * @author WN
 */
class CustomerIntelligenceEntityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @author WN
     */
    public function testInstance()
    {
        $entity = new CustomerIntelligenceEntity();

        $this->assertInstanceOf('WNowicki\Generic\Contracts\Entity', $entity);
        $this->assertInstanceOf('PayBreak\Sdk\Entities\Application\CustomerIntelligenceEntity', $entity);
    }

    /**
     * @author WN
     */
    public function testMakeEmpty()
    {
        $fulfilmentEntity = CustomerIntelligenceEntity::make([]);
        
        $this->assertInstanceOf('WNowicki\Generic\Contracts\Entity', $fulfilmentEntity);
        $this->assertInstanceOf('PayBreak\Sdk\Entities\Application\CustomerIntelligenceEntity', $fulfilmentEntity);
    }

    /**
     * @author WN
     */
    public function testToArray()
    {
        $this->assertInternalType('array', CustomerIntelligenceEntity::make([])->toArray());
    }

    /**
     * @author WN
     */
    public function testSetLeadScore()
    {
        $entity = new CustomerIntelligenceEntity();

        $this->assertInstanceOf(
            'PayBreak\Sdk\Entities\Application\CustomerIntelligenceEntity',
            $entity->setLeadScoreId(5)
        );
    }

    /**
     * @author WN
     */
    public function testGetLeadScore()
    {
        $entity = new CustomerIntelligenceEntity();

        $entity->setLeadScoreId(6);

        $this->assertSame(6, $entity->getLeadScoreId());
    }
}
