<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\FulfilmentRequest\Entity;

class FullFulfilmentRequest extends FulfilmentRequestAbstract implements FulfilmentRequestInterface
{
    /**
     * Get Fulfilment Type
     *
     * @return int
     */
    public function getFulfilmentType()
    {
        return self::TYPE_FULL;
    }

}
