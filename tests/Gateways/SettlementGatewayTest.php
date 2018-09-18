<?php
/*
 * This file is part of the PayBreak/paybreak-sdk-php package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Basket\Gateways;

use Carbon\Carbon;
use PayBreak\Sdk\Gateways\SettlementGateway;

/**
 * Settlement Gateway Test
 *
 * @author WN
 * @package Tests\Basket\Gateways
 */
class SettlementGatewayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @author ??
     */
    public function testInstance()
    {
        /** @var \PayBreak\Sdk\ApiClient\ApiClientFactoryInterface $mock */
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $this->assertInstanceOf('PayBreak\Sdk\Gateways\SettlementGateway', new SettlementGateway($mock));
    }

    /**
     * @author ??
     */
    public function testGetSettlementReports()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn([['id' => 1]]);
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $settlementGateway = new SettlementGateway($mock);

        $this->assertInternalType('array', $settlementGateway->getSettlementReports('xxxx'));
    }

    /**
     * @author GK
     */
    public function testGetAggregateSettlementReports()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn([['id' => 1]]);
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $settlementGateway = new SettlementGateway($mock);

        $since = Carbon::now();
        $until = Carbon::now();

        $this->assertInternalType('array', $settlementGateway->getAggregateSettlementReports('xxxx', $since, $until));
    }

    /**
     * @author ??
     */
    public function testGetSingleSettlementReport()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn([['id' => 1]]);
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $settlementGateway = new SettlementGateway($mock);

        $this->assertInternalType('array', $settlementGateway->getSingleSettlementReport('xxxx', 12));
    }
}
