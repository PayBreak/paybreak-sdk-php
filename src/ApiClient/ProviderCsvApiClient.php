<?php
/*
 * This file is part of the PayBreak/basket package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\ApiClient;

use Psr\Http\Message\ResponseInterface;
use WNowicki\Generic\ApiClient\ErrorResponseException;
use WNowicki\Generic\ApiClient\WrongResponseException;
use Psr\Log\LoggerInterface;

/**
 * Class ProviderCsvApiClient
 *
 * @author EA
 * @package PayBreak\Sdk\ApiClient
 */
class ProviderCsvApiClient extends ProviderApiClient
{
    /**
     * @author WN
     * @param string $baseUrl
     * @param string $token
     * @param LoggerInterface $logger
     * @return ProviderApiClient
     */
    public static function make($baseUrl, $token = '', LoggerInterface $logger = null)
    {
        $ar = [];
        $ar['base_uri'] = $baseUrl;

        if ($token != '') {

            $ar['headers'] = ['Authorization' => 'ApiToken token="' . $token . '"'];
        }

        return new self($ar, $logger);
    }

    /**
     * @author EA
     * @param ResponseInterface $response
     * @return array
     * @throws WrongResponseException
     */
    protected function processResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() == 204) {
            return null;
        }

        if (strpos($response->getHeaderLine('Content-Type'), 'text/csv') !== false) {
            return ['csv' => $response->getBody()->getContents()] ;
        }

        throw new WrongResponseException('Response body was malformed csv', $response->getStatusCode());
    }

    /**
     * @author EA
     * @param string $uri
     * @param array $body
     * @param array $query
     * @return array
     * @throws ErrorResponseException
     * @throws \Exception
     */
    public function get($uri, array $body = [], array $query = [])
    {
        return parent::get($uri . '.csv', $body, $query);
    }
}
