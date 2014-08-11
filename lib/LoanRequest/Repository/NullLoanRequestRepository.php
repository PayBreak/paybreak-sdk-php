<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\LoanRequest\Repository;

use Graham\LoanRequest\Entity\LoanRequestInterface;
use Graham\LoanRequest\Entity\SimpleLoanRequest;

/**
 * Class NullLoanRequestRepository
 *
 * @author WN
 * @package Graham\LoanRequest\Repository
 */
class NullLoanRequestRepository implements LoanRequestRepositoryInterface
{
    /**
     * Saves LoanRequest Entity in Repository
     *
     * @param  LoanRequestInterface $loanRequest
     * @return bool
     */
    public function save(LoanRequestInterface $loanRequest)
    {
        return true;
    }

    /**
     * Find LoanRequest Entity by ID
     *
     * @param  string                                               $id
     * @return \Graham\LoanRequest\Entity\LoanRequestInterface|bool
     */
    public function findById($id)
    {
        $rtn = new SimpleLoanRequest();

        $rtn->setId($id);

        return $rtn;
    }

    public function findAll($offset = 0, $length = 50)
    {
        // TODO: Implement findAll() method.
    }

}
