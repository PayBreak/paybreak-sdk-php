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

/**
 * Customer Intelligence Gateway
 *
 * @author GK
 */
class CustomerIntelligenceGateway extends AbstractGateway
{
    /**
     * @author GK
     * @param $installation
     * @param $token
     * @return array
     * @throws \WNowicki\Generic\Exception
     */
    public function getCustomerIntelligence($installation, $token)
    {
        return $this->fetchDocument(
            '/v4/installations/' . $installation . '/lead-score',
            $token,
            'LeadScore'
        );
    }

    /**
     * @author GK
     * @param string $installation
     * @param array $body
     * @param string $token
     * @return array
     * @throws \WNowicki\Generic\Exception
     */
    public function performLeadScore($installation, array $body, $token)
    {
        return $this->postDocument(
            '/v4/installations/' . $installation . '/lead-score',
            $body,
            $token,
            'LeadScore'
        );
    }
}
