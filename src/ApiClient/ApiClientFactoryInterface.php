<?php
/*
 * This file is part of the PayBreak/paybreak-sdk-php package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\ApiClient;

/**
 * Api Client Factory
 *
 * @author WN
 * @package PayBreak\Sdk\ApiClient
 */
interface ApiClientFactoryInterface
{
    /**
     * @author WN
     * @param string $token
     * @return ProviderApiClient
     */
    public function makeApiClient($token);
}
