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

use PayBreak\Sdk\Gateways\CreditInfoGateway;

/**
 * Credit Information Test
 *
 * @author WN
 * @package Tests\Basket\Gateways
 */
class CreditInformationTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        /** @var \PayBreak\Sdk\ApiClient\ApiClientFactoryInterface $mock */
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $this->assertInstanceOf('PayBreak\Sdk\Gateways\CreditInfoGateway', new CreditInfoGateway($mock));
    }

    public function testGetInstallation()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\Gateways\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn([]);

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $creditInfoGateway = new CreditInfoGateway($mock);

        $this->assertInternalType(
            'array',
            $creditInfoGateway->getCreditInfo('xxx', 123, 'yyy')
        );
    }
}
