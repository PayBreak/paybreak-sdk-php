<?php
/*
 * This file is part of the PayBreak/basket package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Gateways;

use PayBreak\Sdk\Entities\Profile\FinancialEntity;
use PayBreak\Sdk\Entities\Profile\PersonalEntity;

/**
 * Class ProfileGateway
 *
 * @author EB
 * @package PayBreak\Sdk\Gateways
 */
class ProfileGateway extends AbstractGateway
{
    /**
     * @author EB
     * @param $application
     * @param array $personal
     * @param $token
     * @return array
     */
    public function createPersonal($application, array $personal, $token)
    {
        $entity = PersonalEntity::make($personal);

        return $this->postDocument(
            '/v4/applications/' . $application . '/user',
            $entity->toArray(),
            $token,
            'Personal'
        );
    }

    /**
     * @author EB
     * @param $user
     * @param array $financial
     * @param $token
     * @return array
     */
    public function setFinancial($user, array $financial, $token)
    {
        $entity = FinancialEntity::make($financial);

        return $this->postDocument(
            '/v4/users/' . $user . '/financial',
            $entity->toArray(),
            $token,
            'Personal'
        );
    }
}
