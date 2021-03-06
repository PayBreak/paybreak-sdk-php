<?php
/*
 * This file is part of the PayBreak/paybreak-sdk-php package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities\Application;

use WNowicki\Generic\AbstractEntity;

/**
 * Fiance Entity
 *
 * @author WN
 * @method $this setLoanAmount(int $loanAmount)
 * @method int|null getLoanAmount()
 * @method $this setOrderAmount(int $orderAmount)
 * @method int|null getOrderAmount()
 * @method $this setDepositAmount(int $depositAmount)
 * @method int|null getDepositAmount()
 * @method $this setSubsidyAmount(int $subsidyAmount)
 * @method int|null getSubsidyAmount()
 * @method $this setSettlementNetAmount(int $settlementNetAmount)
 * @method int|null getCommissionAmount()
 * @method $this setCommissionAmount(int $commissionAmount)
 * @method int|null getSettlementNetAmount()
 * @method $this setOption(string $option)
 * @method string|null getOption()
 * @method $this setHoliday(int $holiday)
 * @method int|null getHoliday()
 * @method $this setPayments(int $payments)
 * @method int|null getPayments()
 * @method $this setTerm(int $term)
 * @method int|null getTerm()
 * @method $this setOptionGroup(string $financeGroup)
 * @method string getOptionGroup()
 *
 * @package PayBreak\Sdk\Entities
 */
class FinanceEntity extends AbstractEntity
{
    protected $properties = [
        'loan_amount',
        'order_amount',
        'deposit_amount',
        'subsidy_amount',
        'commission_amount',
        'settlement_net_amount',
        'option',
        'option_group',
        'holiday',
        'payments',
        'term',
    ];
}
