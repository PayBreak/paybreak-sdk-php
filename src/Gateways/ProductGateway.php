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
        $rtn = [];

//        echo '<pre>' . print_r($response, true); die();

        foreach($response as &$group) {
            foreach($group['products'] as &$product) {
                $product = ProductEntity::make($product);
            }

////            array_push($rtn, GroupEntity::make($group));
//            var_dump($group['products'][0]['merchant_fees']['percentage']);
////            die();
            $group = GroupEntity::make($group);
//            var_dump($group);

        }

        return $response;
    }
}
