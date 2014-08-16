<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\FulfilmentRequest\Repository;

use Graham\FulfilmentRequest\Entity\FulfilmentRequestInterface;

/**
 * Interface FulfilmentRequestRepositoryInterface
 *
 * @author WN
 * @package Graham\FulfilmentRequest\Repository
 */
interface FulfilmentRequestRepositoryInterface
{
    /**
     * Saves FulfilmentRequest in Repository
     *
     * @param  FulfilmentRequestInterface $fulfilmentRequest
     * @return bool
     */
    public function save(FulfilmentRequestInterface $fulfilmentRequest);
}
