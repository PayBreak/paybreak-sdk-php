<?php

namespace Tests\Gateways;

use PayBreak\Sdk\ApiClient\ProviderCsvApiClient;

/**
 * Provider Csv Api Client Test
 *
 * @author EB
 */
class ProviderCsvApiClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @author EB
     */
    public function testMake()
    {
        $this->assertInstanceOf(
            ProviderCsvApiClient::class,
            ProviderCsvApiClient::make('http://httpbin.org/', 'testToken')
        );
    }
}
