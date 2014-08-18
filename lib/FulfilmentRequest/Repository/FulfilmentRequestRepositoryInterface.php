<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\FulfilmentRequest\Repository;

use PayBreak\Sdk\FulfilmentRequest\Entity\FulfilmentRequestInterface;

/**
 * Interface FulfilmentRequestRepositoryInterface
 *
 * @author WN
 * @package PayBreak\Sdk\FulfilmentRequest\Repository
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
