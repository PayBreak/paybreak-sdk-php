<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\LoanRequest\Repository;

use PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface;

/**
 * Interface LoanRequestRepositoryInterface
 *
 * @author WN
 * @package PayBreak\Sdk\LoanRequest\Repository
 */
interface LoanRequestRepositoryInterface
{
    /**
     * Saves LoanRequest Entity in Repository
     *
     * @param  LoanRequestInterface $loanRequest
     * @return bool
     */
    public function save(LoanRequestInterface $loanRequest);

    /**
     * Find LoanRequest Entity by ID
     *
     * @param  string                                               $id
     * @return \PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface|bool
     */
    public function findById($id);

    /**
     * Find all
     *
     * @param  int                                                    $offset
     * @param  int                                                    $length
     * @return \PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface[]|bool
     */
    public function findAll($offset = 0, $length = 50);
}
