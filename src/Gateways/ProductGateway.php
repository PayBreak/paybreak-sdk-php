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
use PayBreak\Sdk\Entities\ProductEntity;

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
        $response = $this->fetchDocument(
                '/v4/installations/' . $extId . '/product-groups?with=products',
                $token,
                'listGroupsWithProducts'
        );

        foreach($response as &$group) {
            foreach($group['products'] as &$product) {
                $product = ProductEntity::make($product);
            }
            $group = GroupEntity::make($group);
        }

        return $response;
    }

    /**
     * @author WN
     * @param string $installation
     * @param string $product
     * @param string $token
     * @return array
     */
    public function getCreditInfo($installation, $product, $token)
    {
        return $this->postDocument(
            '/v4/installations/' . $installation . '/products/' . $product . '/get-credit-information',
            $token,
            'CreditInfo'
        );
    }
}
