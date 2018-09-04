<?php

namespace PayBreak\Sdk\Gateways;

use PayBreak\Sdk\Entities\InstallationEntity;

/**
 * Customer Intelligence Gateway
 *
 * @author GK
 */
class CustomerIntelligenceGateway extends AbstractGateway
{
    /**
     * @author GK
     * @param InstallationEntity $installationEntity
     * @param $token
     * @return array
     * @throws \WNowicki\Generic\Exception
     */
    public function performLeadScore(InstallationEntity $installationEntity, $body, $token)
    {
        return $this->postDocument(
            '/v4/installations/' . $installationEntity->getId() . '/lead-score',
            $body,
            $token,
            'LeadScore'
        );
    }
}
