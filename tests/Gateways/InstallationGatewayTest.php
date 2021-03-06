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

use PayBreak\Sdk\Gateways\InstallationGateway;
use PayBreak\ApiClient\ErrorResponseException;

class InstallationGatewayTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        /** @var \PayBreak\Sdk\ApiClient\ApiClientFactoryInterface $mock */
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $this->assertInstanceOf('PayBreak\Sdk\Gateways\InstallationGateway', new InstallationGateway($mock));
    }

    public function testGetInstallation()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn([]);

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $installationGateway = new InstallationGateway($mock);

        $this->assertInstanceOf(
            'PayBreak\Sdk\Entities\InstallationEntity',
            $installationGateway->getInstallation(1, 'xxxx')
        );
    }

    public function testGetInstallationException()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willThrowException(new \Exception());

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $installationGateway = new InstallationGateway($mock);

        $this->setExpectedException('WNowicki\Generic\Exception', 'Problem with get: Installation data form Provider API');

        $installationGateway->getInstallation(1, 'xxx');
    }

    public function testGetInstallationErrorResponseException()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willThrowException(new ErrorResponseException('Test'));

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $installationGateway = new InstallationGateway($mock);

        $this->setExpectedException('WNowicki\Generic\Exception', 'Test');

        $installationGateway->getInstallation(1, 'xxx');
    }

    public function testGetInstallationsEmpty()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn([]);

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $installationGateway = new InstallationGateway($mock);

        $this->assertInternalType('array', $installationGateway->getInstallations('xxxx'));
        $this->assertCount(0, $installationGateway->getInstallations('xxxx'));
    }

    public function testGetInstallations()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn([
            [
                'id' => 'Test Id',
                'return_url' => 'http://httpbin.org',
            ],
        ]);

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $installationGateway = new InstallationGateway($mock);

        $response = $installationGateway->getInstallations('xxxx');

        $this->assertInternalType('array', $response);
        $this->assertCount(1, $response);
        $this->assertInstanceOf('PayBreak\Sdk\Entities\InstallationEntity', $response[0]);
    }

    public function testGetProductGroups()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn([]);

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $installationGateway = new InstallationGateway($mock);

        $this->assertInternalType('array', $installationGateway->getProductGroups('xxxx', 'xxxx'));
    }

    public function testListProducts()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn([]);

        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $installationGateway = new InstallationGateway($mock);

        $this->assertInternalType('array', $installationGateway->listProducts('xxxx', 'xxxx', 'xxxx'));
    }
}
