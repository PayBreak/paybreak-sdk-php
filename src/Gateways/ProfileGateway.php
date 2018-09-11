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

use PayBreak\Sdk\Entities\Profile\AddressEntity;
use PayBreak\Sdk\Entities\Profile\EmploymentEntity;
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
     * @author EA
     * @param int $user
     * @param array $personal
     * @param $token
     * @return array
     */
    public function setPersonal($user, array $personal, $token)
    {
        $entity = PersonalEntity::make($personal);

        return $this->postDocument(
            '/v4/users/' . $user . '/personal',
            $entity->toArray(),
            $token,
            'Set Personal'
        );
    }

    /**
     * @author EB
     * @param int $user
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
            'Set Financial'
        );
    }

    /**
     * @author EA
     * @param int $user
     * @param array $employment
     * @param $token
     * @return array
     */
    public function setEmployment($user, array $employment, $token)
    {
        $entity = EmploymentEntity::make($employment);

        return $this->postDocument(
            '/v4/users/' . $user . '/employment',
            $entity->toArray(),
            $token,
            'Set Employment'
        );
    }

    /**
     * @author EB
     * @param $user
     * @param string $token
     * @return array
     */
    public function getAddresses($user, $token)
    {
        return $this->fetchDocument('/v4/users/' . $user . '/addresses', $token, 'Fetch Addresses');
    }

    /**
     * @author EB
     * @param $user
     * @param array $address
     * @param string $token
     * @return array
     */
    public function addAddress($user, array $address, $token)
    {
        return $this->postDocument(
            '/v4/users/' . $user . '/address',
            AddressEntity::make($address)->toArray(),
            $token,
            'Add Address'
        );
    }

    /**
     * @author EB
     * @param $user
     * @param $address
     * @param string $token
     * @return array
     */
    public function removeAddress($user, $address, $token)
    {
        return $this->deleteDocument(
            '/v4/users/' . $user . '/address/' . $address,
            $token,
            'Remove Address'
        );
    }
}
