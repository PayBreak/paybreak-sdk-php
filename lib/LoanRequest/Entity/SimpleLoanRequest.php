<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\LoanRequest\Entity;

/**
 * Class SimpleLoanRequest
 *
 * @author WN
 * @package PayBreak\Sdk\LoanRequest\Entity
 */
class SimpleLoanRequest extends LoanRequestAbstract
{
    /**
     * Returns Checkout Type
     *
     * @return int
     */
    public function getCheckoutType()
    {
        return self::TYPE_SIMPLE;
    }

}
