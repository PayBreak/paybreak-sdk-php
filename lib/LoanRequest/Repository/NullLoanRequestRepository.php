<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\LoanRequest\Repository;

use PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface;
use PayBreak\Sdk\LoanRequest\Entity\SimpleLoanRequest;

/**
 * Class NullLoanRequestRepository
 *
 * @author WN
 * @package PayBreak\Sdk\LoanRequest\Repository
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
     * @return \PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface|bool
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
