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

use PayBreak\ApiClient\ApiClient;
use Psr\Log\LoggerInterface;

/**
 * Class ProviderApiClient
 *
 * @author WN
 * @package PayBreak\Sdk\ApiClient
 */
class ProviderApiClient extends ApiClient
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
        $headers = [];

        if ($token != '') {
            $headers['Authorization'] = "ApiToken token=\"" . $token . "\"";
        }

        return new self(['base_uri' => $baseUrl], $logger, $headers);
    }
}
