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
 * @method $this setLoan(Product\LoanEntity $loanEntity)
 * @method Product\LoanEntity|null getLoan()
 * @method $this setDeposit(Product\DepositEntity $depositEntity)
 * @method Product\DepositEntity|null getDeposit()
 * @method $this setMerchantFees(Product\MerchantFeesEntity $merchantFeesEntity)
 * @method Product\MerchantFeesEntity|null getMerchantFees()
 * @method $this setMerchantCommission(Product\MerchantCommissionEntity $commission)
 * @method Product\MerchantCommissionEntity|null getMerchantCommission()
 * @method $this setOrder(Product\OrderEntity $orderEntity)
 * @method Product\OrderEntity|null getOrder()
 * @package PayBreak\Sdk\Entities
 */
class ProductEntity extends AbstractEntity
{
    protected $properties = [
        'id' => self::TYPE_STRING,
        'product_group' => self::TYPE_STRING,
        'name' => self::TYPE_STRING,
        'holidays',
        'payments',
        'per_annum_interest_rate',
        'initial_payment_upfront',
        'customer_service_fee',
        'customer_settlement_fee',
        'loan' => 'PayBreak\Sdk\Entities\Product\LoanEntity',
        'deposit' => 'PayBreak\Sdk\Entities\Product\DepositEntity',
        'merchant_fees' => 'PayBreak\Sdk\Entities\Product\MerchantFeesEntity',
        'merchant_commission' => 'PayBreak\Sdk\Entities\Product\MerchantCommissionEntity',
        'order' => 'PayBreak\Sdk\Entities\Product\OrderEntity',
    ];
}
