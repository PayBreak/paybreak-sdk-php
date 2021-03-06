<?php
/*
* This file is part of the PayBreak/paybreak-sdk-php package.
*
* (c) PayBreak <dev@paybreak.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace PayBreak\Sdk\Gateways;

use PayBreak\Sdk\SdkException;
use Carbon\Carbon;

/**
 * Application Gateway
 *
 * @author MS
 * @package PayBreak\Sdk\Gateways
 */
class SettlementGateway extends AbstractGateway
{
    /**
     * @author WN, MS
     * @param string $token
     * @param Carbon|null $since
     * @param Carbon|null $until
     * @return array
     */
    public function getSettlementReports($token, Carbon $since = null, Carbon $until = null)
    {
        return $this->fetchDocument(
            '/v4/settlement-reports',
            $token,
            'Settlement',
            [
                'since' => $since !== null?$since->format('Y-m-d'):null,
                'until' => $until !== null?$until->format('Y-m-d'):null,
            ]
        );
    }

    /**
     * @author GK
     * @param string $token
     * @param Carbon $since
     * @param Carbon $until
     * @return array
     */
    public function getAggregateSettlementReports($token, Carbon $since, Carbon $until)
    {
        return $this->fetchDocument(
            '/v4/period-aggregate-settlement-reports',
            $token,
            'Settlement',
            [
                'since' => $since->format('Y-m-d'),
                'until' => $until->format('Y-m-d'),
            ]
        );
    }

    /**
     * @author WN
     * @param string $token
     * @param int $settlementId
     * @return array
     * @throws SdkException
     */
    public function getSingleSettlementReport($token, $settlementId)
    {
        return $this->fetchDocument('/v4/settlement-reports/' . $settlementId, $token, 'Settlement Report');
    }

    /**
     * @author EA
     * @param string $token
     * @param int $settlementId
     * @return array
     * @throws SdkException
     */
    public function getSingleAggregateSettlementReport($token, $settlementId)
    {
        return $this->fetchDocument('/v4/aggregate-settlement-reports/' . $settlementId, $token, 'Settlement Report');
    }
}
