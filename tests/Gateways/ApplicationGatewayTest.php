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

use PayBreak\Sdk\Entities\ApplicationEntity;
use PayBreak\Sdk\Gateways\ApplicationGateway;
use WNowicki\Generic\ApiClient\ErrorResponseException;

/**
 * Application Gateway Test
 *
 * @author WN
 * @package Tests\Basket\Gateways
 */
class ApplicationGatewayTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        /** @var \PayBreak\Sdk\ApiClient\ApiClientFactoryInterface $mock */
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $this->assertInstanceOf('PayBreak\Sdk\Gateways\ApplicationGateway', new ApplicationGateway($mock));
    }

    public function testGetApplication()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn(['id' => 123]);
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $applicationGateway = new ApplicationGateway($mock);

        $this->assertInstanceOf(
            'PayBreak\Sdk\Entities\ApplicationEntity',
            $application = $applicationGateway->getApplication(1, 'xxxx')
        );

        $this->assertSame(123, $application->getId());
    }

    public function testFulfilApplication()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('post')->willReturn([]);
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $applicationGateway = new ApplicationGateway($mock);

        $this->assertTrue($applicationGateway->fulfilApplication(1, 'xxxx'));
    }

    public function testCancelApplication()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('post')->willReturn([]);
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $applicationGateway = new ApplicationGateway($mock);

        $this->assertTrue($applicationGateway->cancelApplication(1, 'Description', 'xxxx'));
    }

    /**
     * @author EB
     */
    public function testGetApplicationCreditInfo()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('post')->willReturn([]);
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $applicationGateway = new ApplicationGateway($mock);

        $this->assertSame([], $applicationGateway->getApplicationCreditInfo(1, 12345678, 'token'));
    }

    /**
     * @author EB
     */
    public function testInitialiseApplication()
    {
        $application = new ApplicationEntity();
        $id = 12345678;
        $url = 'test';

        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('post')->willReturn(['application' => $id, 'url' => $url]);
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $applicationGateway = new ApplicationGateway($mock);
        $response = $applicationGateway->initialiseApplication($application, 'token');

        $this->assertSame($id, $response->getId());
        $this->assertSame($url, $response->getResumeUrl());
        $this->assertInstanceOf('PayBreak\Sdk\Entities\ApplicationEntity', $response);
    }

    /**
     * @author EB
     * @throws \PayBreak\Sdk\SdkException
     */
    public function testInitialiseApplicationForErrorResponseException()
    {
        $application = new ApplicationEntity();

        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('post')
            ->willThrowException(new ErrorResponseException('Failed', 500));
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $applicationGateway = new ApplicationGateway($mock);

        $this->setExpectedException('PayBreak\Sdk\SdkException', 'Failed');
        $applicationGateway->initialiseApplication($application, 'token');
    }

    /**
     * @author EB
     * @throws \PayBreak\Sdk\SdkException
     */
    public function testInitialiseApplicationForException()
    {
        $application = new ApplicationEntity();

        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('post')
            ->willThrowException(new \Exception('It Failed', 500));
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $applicationGateway = new ApplicationGateway($mock);

        $this->setExpectedException('PayBreak\Sdk\SdkException', 'Problem Initialising Application on Provider API');
        $applicationGateway->initialiseApplication($application, 'token');
    }

    /**
     * @author EB
     */
    public function testGetPendingCancellations()
    {
        $mockApiClient = $this->getMock('PayBreak\Sdk\ApiClient\ProviderApiClient');

        $mockApiClient->expects($this->any())->method('get')->willReturn([]);
        $mock = $this->getMock('PayBreak\Sdk\ApiClient\ApiClientFactoryInterface');

        $mock->expects($this->any())->method('makeApiClient')->willReturn($mockApiClient);

        $applicationGateway = new ApplicationGateway($mock);

        $this->assertSame([], $applicationGateway->getPendingCancellations(1, 'token'));
    }
}
