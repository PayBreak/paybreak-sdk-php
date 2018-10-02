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
     * @author GK
     */
    public function testToArrayWhenDataIsProvided()
    {
        $this->assertEquals(
            [
                'lead_score_id' => 2,
                'pre_approval_id' => 3,
            ],
            CustomerIntelligenceEntity::make([
                'lead_score_id' => 2,
                'pre_approval_id' => 3,
            ])->toArray()
        );
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

    /**
     * @author GK
     */
    public function testSetPreApprovalScore()
    {
        $entity = new CustomerIntelligenceEntity();

        $this->assertInstanceOf(
            'PayBreak\Sdk\Entities\Application\CustomerIntelligenceEntity',
            $entity->setPreApprovalId(5)
        );
    }

    /**
     * @author GK
     */
    public function testGetPreApprovalScore()
    {
        $entity = new CustomerIntelligenceEntity();

        $entity->setPreApprovalId(7);

        $this->assertSame(7, $entity->getPreApprovalId());
    }
}
