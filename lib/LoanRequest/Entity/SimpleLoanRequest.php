<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\LoanRequest\Entity;

/**
 * Class SimpleLoanRequest
 *
 * @author WN
 * @package Graham\LoanRequest\Entity
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
