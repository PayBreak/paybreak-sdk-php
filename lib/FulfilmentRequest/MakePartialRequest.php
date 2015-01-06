<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\FulfilmentRequest;

use PayBreak\Sdk\CustomType\OrderItem;
use PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface;
use PayBreak\Sdk\StandardInterface\ConfigurationInterface;
use PayBreak\Sdk\LoanRequest\Repository\LoanRequestRepositoryInterface;
use PayBreak\Sdk\FulfilmentRequest\Repository\FulfilmentRequestRepositoryInterface;
use PayBreak\Sdk\FulfilmentRequest\Entity\PartialFulfilmentRequest;

/**
 * Class MakePartialRequest
 *
 * @author WN
 * @package PayBreak\Sdk\FulfilmentRequest
 */
class MakePartialRequest extends MakeRequestAbstract
{
    protected $fulfilmentItems = [];

    public function __construct(
        ConfigurationInterface $configuration,
        LoanRequestRepositoryInterface $loanRequestRepository,
        FulfilmentRequestRepositoryInterface $fulfilmentRequestRepository
    )
    {
        parent::__construct($configuration, $loanRequestRepository, $fulfilmentRequestRepository);
        $this->fulfilmentRequest = new PartialFulfilmentRequest();
    }

    /**
     * @param  LoanRequestInterface $loanRequest
     * @return bool
     * @throws \Exception
     */
    public function setLoanRequest(LoanRequestInterface $loanRequest)
    {
        // can't do this check, since getCheckoutType() is no longer part of loan request
//        if (
//              $loanRequest->getCheckoutVersion() < "3.3"
//           && $loanRequest->getCheckoutType() != LoanRequestInterface::TYPE_EXTENDED
//        )
//            throw new \Exception('Checkout type not supported!');

        return parent::setLoanRequest($loanRequest);
    }

    /**
     * Add Fulfilment Item from essential details
     *
     * @param  string $sku
     * @param  int    $quantity
     * @return bool
     */
    public function addFulfilmentItem($sku, $quantity)
    {
        $item = new OrderItem();

        $item->setSku($sku);
        $item->setQuantity($quantity);

        return $this->addFulfilmentItemObject($item);
    }

    /**
     * Add Fulfilment Item object
     *
     * @param  OrderItem $item
     * @return bool
     */
    public function addFulfilmentItemObject(OrderItem $item)
    {
        $this->fulfilmentRequest->addFulfilmentItem($item);
        return true;
    }

    /**
     * Get Fulfilment Items
     *
     * @return \PayBreak\Sdk\CustomType\OrderItem[]
     */
    public function getFulfilmentItems()
    {
        return $this->fulfilmentRequest->getFulfilmentItems();
    }

    /**
     * Prepare Fulfilment Request
     *
     * @throws \Exception
     * @return array
     */
    public function prepareRequest()
    {
        $ar = [];

        $this->prepareEssentialRequest($ar);
        foreach ($this->getFulfilmentItems() as $k => $v) {
            if ($v->getQuantity() > 0) {
                $ar['order_items'][] = [
                    'sku'       => $k,
                    'quantity'  => $v->getQuantity()
                ];
            }
        }
        $this->addMerchantHash($ar);

        return $ar;
    }

    /**
     * Confirm Sent
     *
     * Should be run once FulfilmentRequest is successfully sent and accepted. Updates FulfilmentRequest and LoanRequest.
     *
     * @return bool
     */
    public function confirmSent()
    {
        // TODO: Here need to find out if this loanRequest is now fulfilled in full or just partial !!!

        parent::confirmSent();
    }
}
