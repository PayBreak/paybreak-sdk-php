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

use PayBreak\Sdk\Gateways\DocumentGateway;

/**
 * Documents Gateway Test
 *
 * @author GK
 * @package Tests\Basket\Gateways
 */
class DocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        /** @var \PayBreak\Sdk\ApiClient\ApiClientFactoryInterface $mock */
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $this->assertInstanceOf('PayBreak\Sdk\Gateways\DocumentGateway', new DocumentGateway($mock));
    }

    public function testGetAgreementPdf()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn(
            ['pdf' => 'document body returned by the api']
        );

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $documentGateway = new DocumentGateway($mock);

        $this->assertInternalType(
            'string',
            $documentGateway->getAgreementPdf('xxx', 'yyy', 123)
        );
    }

    public function testGetPreAgreementPdf()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn(
            ['pdf' => 'document body returned by the api']
        );

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $documentGateway = new DocumentGateway($mock);

        $this->assertInternalType(
            'string',
            $documentGateway->getPreAgreementPdf('xxx', 'yyy', 123)
        );
    }
}
