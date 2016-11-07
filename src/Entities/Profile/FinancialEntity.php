<?php
/*
 * This file is part of the PayBreak/basket package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities\Profile;

use WNowicki\Generic\AbstractEntity;

/**
 * Financial Entity
 *
 * @author EB
 * @method int|null getMonthlyIncome()
 * @method setMonthlyIncome($monthlyIncome)
 * @method int|null getMonthlyOutgoings()
 * @method setMonthlyOutgoings($monthlyOutgoings)
 * @method string|null getBankSortCode()
 * @method setBankSortCode($sortCode)
 * @method string|null getBankAccount()
 * @method setBankAccount($sortCode)
 *
 * @package PayBreak\Sdk\Entities\Profile;
 */
class FinancialEntity extends AbstractEntity
{
    protected $properties = [
        'monthly_income' => self::TYPE_INT,
        'monthly_outgoings' => self::TYPE_INT,
        'bank_sort_code' => self::TYPE_STRING,
        'bank_account' => self::TYPE_STRING,
    ];
}
