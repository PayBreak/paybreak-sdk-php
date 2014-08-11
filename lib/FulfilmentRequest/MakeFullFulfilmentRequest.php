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

use Graham\FulfilmentRequest\Entity\FullFulfilmentRequest;
use Graham\FulfilmentRequest\Repository\FulfilmentRequestRepositoryInterface;
use Graham\LoanRequest\Repository\LoanRequestRepositoryInterface;
use Graham\StandardInterface\ConfigurationInterface;

class MakeFullFulfilmentRequest extends MakeFulfilmentRequest
{
    public function __construct(
        ConfigurationInterface $configuration,
        LoanRequestRepositoryInterface $loanRequestRepository,
        FulfilmentRequestRepositoryInterface $fulfilmentRequestRepository = NULL
    )
    {
        parent::__construct($configuration, $loanRequestRepository, $fulfilmentRequestRepository);
        $this->fulfilmentRequest = new FullFulfilmentRequest();
    }

}
