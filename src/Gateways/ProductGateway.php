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
     * @param array $params
     * @return array
     */
    public function getCreditInfo($installation, $product, $token, array $params)
    {
        return $this->postDocument(
            '/v4/installations/' . $installation . '/products/' . $product . '/get-credit-information',
            $params,
            $token,
            'CreditInfo'
        );
    }

    /**
     * @param string $extId
     * @param string $productGroup
     * @param string $token
     * @return array
     * @author SL
     */
    public function getProductsInGroup($extId, $productGroup, $token)
    {
        $response = $this->fetchDocument(
            '/v4/installations/' . $extId . '/product-groups/' . $productGroup . '/products',
            $token,
            'getProductsByGroup'
        );

        $products = [];

        foreach($response as $product) {
            $products[] = ProductEntity::make($product);
        }

        return $products;
    }

    /**
     * author EA
     * @param string $installation
     * @param string $token
     * @param array $params
     * @return array
     */
    public function orderProducts($installation, $token, array $params)
    {
        return $this->postDocument(
            '/v4/installations/' . $installation . 'products/set-product-order',
            $params,
            $token,
            'orderProducts'
        );
    }
}
