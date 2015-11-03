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
use PayBreak\Sdk\Entities\GroupEntity;

/**
 * Product Gateway
 *
 * @author EB
 * @package PayBreak\Sdk\Gateways
 */
class ProductGateway extends AbstractGateway
{
    /**
     * @param string $extId
     * @param string $token
     * @return GroupEntity
     */
    public function getProductGroupsWithProducts($extId, $token)
    {
        return GroupEntity::make(
            $this->fetchDocument(
                '/v4/installations/' . $extId . '/product-groups?with=products',
                $token,
                'listGroupsWithProducts'
            )
        );
    }
}
