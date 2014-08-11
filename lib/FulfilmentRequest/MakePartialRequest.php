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

use Graham\StandardInterface\ConfigurationInterface;
use Graham\LoanRequest\Repository\LoanRequestRepositoryInterface;
use Graham\FulfilmentRequest\Repository\FulfilmentRequestRepositoryInterface;
use Graham\FulfilmentRequest\Entity\PartialFulfilmentRequest;

class MakePartialRequest extends MakeRequestAbstract
{
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
     * Prepare Fulfilment Request
     *
     * @throws \Exception
     * @return array
     */
    public function prepareRequest()
    {
        $ar = [];

        $this->prepareEssentialRequest($ar);

        // TODO: Something with items

        $this->addMerchantHash($ar);

        return $ar;
    }

}
