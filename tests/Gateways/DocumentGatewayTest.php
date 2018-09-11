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

use PayBreak\Sdk\Gateways\DocumentGateway;

/**
 * Documents Gateway Test
 *
 * @author GK
 * @package Tests\Basket\Gateways
 */
class DocumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @author GK
     */
    public function testInstance()
    {
        /** @var \PayBreak\Sdk\ApiClient\ApiClientFactoryInterface $mock */
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $this->assertInstanceOf('PayBreak\Sdk\Gateways\DocumentGateway', new DocumentGateway($mock));
    }

    /**
     * @author GK
     */
    public function testGetAvailableDocuments()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn(
            [
                "agreement",
                "pre-agreement",
                "adequate-explanation"
            ]
        );

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $documentGateway = new DocumentGateway($mock);

        $this->assertEquals(
            [
                "agreement",
                "pre-agreement",
                "adequate-explanation"
            ],
            $documentGateway->getAvailableDocuments('xxx', 'yyy', 123)
        );
    }

    /**
     * @author GK
     */
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

    /**
     * @author GK
     */
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

    /**
     * @author GK
     */
    public function testGetAdequateExplanationPdf()
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
            $documentGateway->getAdequateExplanation('xxx', 'yyy', 123)
        );
    }
}
