<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\FulfilmentRequest;

use Graham\CustomType\OrderItem;
use Graham\LoanRequest\Entity\LoanRequestInterface;
use Graham\StandardInterface\ConfigurationInterface;
use Graham\LoanRequest\Repository\LoanRequestRepositoryInterface;
use Graham\FulfilmentRequest\Repository\FulfilmentRequestRepositoryInterface;
use Graham\FulfilmentRequest\Entity\PartialFulfilmentRequest;

/**
 * Class MakePartialRequest
 *
 * @author WN
 * @package Graham\FulfilmentRequest
 */
class MakePartialRequest extends MakeRequestAbstract
{
    protected $fulfilmentItems = [];

    public function __construct(
        ConfigurationInterface $configuration,
        LoanRequestRepositoryInterface $loanRequestRepository,
        FulfilmentRequestRepositoryInterface $fulfilmentRequestRepository = NULL
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
        if ($loanRequest->getCheckoutType() != LoanRequestInterface::TYPE_EXTENDED)
            throw new \Exception('Checkout type not supported!');

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
        $this->fulfilmentItems[$item->getSku()] = $item;

        return true;
    }

    /**
     * Get Fulfilment Items
     *
     * @return \Graham\CustomType\OrderItem[]
     */
    public function getFulfilmentItems()
    {
        return $this->fulfilmentItems;
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
            $ar['order_items'][] = [
                'sku'       => $k,
                'quantity'  => $v->getQuantity()
            ];
        }

        $this->addMerchantHash($ar);

        return $ar;
    }

}
