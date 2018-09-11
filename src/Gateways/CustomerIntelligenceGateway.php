<?php

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
