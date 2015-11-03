<?php
/*
 * This file is part of the PayBreak/basket package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Entities;

use WNowicki\Generic\AbstractEntity;

/**
 * Product Entity
 *
 * @author EB
 *
 * @method $this setId(int $id)
 * @method int|null getId()
 * @method $this setProductGroup(string $productGroup)
 * @method string|null getProductGroup()
 * @method $this setName(string $name)
 * @method string|null getName()
 * @method $this setHolidays(int $holidays)
 * @method int|null getHolidays()
 * @method $this setPayments(int $payments)
 * @method int|null getPayments()
 * @method $this setGetPerAnnumInterestRate(float $perAnnumInterestRate)
 * @method float|null getPerAnnumInterestRate()
 * @method $this setInitialPaymentUpfront(bool $InitialPaymentUpfront)
 * @method bool|null getInitialPaymentUpfront()
 * @method $this setCustomerServiceFee(int $customerServiceFee)
 * @method int|null getCustomerServiceFee()
 * @method $this setCustomerSettlementFee(int $customerSettlementFee)
 * @method int|null getCustomerSettlementFee()
 * @method $this setLoan(array $loan)
 * @method array|null getLoan()
 * @method $this setDeposit(array $deposit)
 * @method array|null getDeposit()
 * @method $this setMerchantFees(array $merchantFees)
 * @method array|null getMerchantFees()
 * @method $this setOrder(array $order)
 * @method array|null getOrder()
 * @package PayBreak\Sdk\Entities
 */
class ProductEntity extends AbstractEntity
{
    protected $properties = [
        'id' => self::TYPE_STRING,
        'product_group' => self::TYPE_STRING,
        'name' => self::TYPE_STRING,
        'holidays' => self::TYPE_INT,
        'payments' => self::TYPE_INT,
        'per_annum_interest_rate',
        'initial_payment_upfront' => self::TYPE_BOOL,
        'customer_service_fee' => self::TYPE_INT,
        'customer_settlement_fee' => self::TYPE_INT,
        'loan' => 'PayBreak\Sdk\Entities\Product\LoanEntity',
        'deposit' => 'PayBreak\Sdk\Entities\Product\DepositEntity',
        'merchant_fees' => 'PayBreak\Sdk\Entities\Product\MerchantFeesEntity',
        'order' => 'PayBreak\Sdk\Entities\Product\OrderEntity',
    ];
}
