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
use WNowicki\Generic\ApiClient\AbstractApiClient;
use WNowicki\Generic\ApiClient\ErrorResponseException;
use WNowicki\Generic\ApiClient\WrongResponseException;
use Psr\Log\LoggerInterface;

/**
 * Class ProviderApiClient
 *
 * @author WN
 * @package App\Gateways
 */
class ProviderApiClient extends AbstractApiClient
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
     * @author WN
     * @param array $body
     * @return array
     */
    protected function processRequestBody(array $body)
    {
        return ['json' => $body];
    }

    /**
     * @author WN
     * @param ResponseInterface $response
     * @return array
     * @throws WrongResponseException
     */
    protected function processResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() == 204) {
            return null;
        }

        if (($responseBody = json_decode($response->getBody()->getContents(), true)) !== null) {
            return $responseBody;
        }

        throw new WrongResponseException('Response body was malformed JSON', $response->getStatusCode());
    }

    /**
     * @author WN
     * @param ResponseInterface $response
     * @throws ErrorResponseException
     */
    protected function processErrorResponse(ResponseInterface $response)
    {
        if (($responseBody = json_decode($response->getBody()->getContents(), true)) &&
            array_key_exists('message', $responseBody)
        ) {
            throw new ErrorResponseException($responseBody['message'], $response->getStatusCode());
        }
    }
}
