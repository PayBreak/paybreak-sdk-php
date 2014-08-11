<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\LoanRequest;

use Graham\CustomType;
use Graham\FieldEncoder;
use Graham\HashGenerator;
use Graham\LoanRequest\Entity\ExtendedLoanRequest;
use Graham\LoanRequest\Entity\LoanRequestInterface;
use Graham\LoanRequest\Repository\LoanRequestRepositoryInterface;
use Graham\StandardInterface\ConfigurationInterface;

/**
 * Class MakeRequest
 *
 * @author WN
 * @package Graham\LoanRequest
 */
class MakeRequest
{
    protected $loanRequest;
    protected $configuration;
    protected $repository;
    protected $additionalData;
    protected $orderItems;

    /**
     *
     * @param  int                                       $type
     * @param  ConfigurationInterface                    $configuration
     * @param  Repository\LoanRequestRepositoryInterface $repository
     * @throws \InvalidArgumentException
     */
    public function __construct(
        $type,
        ConfigurationInterface $configuration,
        LoanRequestRepositoryInterface $repository
    ) {
        $this->configuration = $configuration;

        $this->repository = $repository;

        if ($type == 1) {
            $this->loanRequest = new Entity\SimpleLoanRequest();
        } elseif ($type == 2) {
            $this->loanRequest = new Entity\ExtendedLoanRequest();
        } else {
            throw new \InvalidArgumentException('Invalid Checkout Type');
        }

        $this->loanRequest->setMerchantInstallation($configuration->getMerchantInstallation());

        $this->loanRequest->setCheckoutVersion($configuration->getCheckoutVersion());
    }

    /**
     * Make Simple Loan Request
     *
     * @param  ConfigurationInterface                    $configuration
     * @param  Repository\LoanRequestRepositoryInterface $repository
     * @return static
     */
    public static function makeSimple(ConfigurationInterface $configuration, LoanRequestRepositoryInterface $repository)
    {
        return new static(Entity\LoanRequestInterface::TYPE_SIMPLE, $configuration, $repository);
    }

    /**
     * Make Extended Loan Request
     *
     * @param  ConfigurationInterface                    $configuration
     * @param  Repository\LoanRequestRepositoryInterface $repository
     * @return static
     */
    public static function makeExtended(ConfigurationInterface $configuration, LoanRequestRepositoryInterface $repository)
    {
        return new static(Entity\LoanRequestInterface::TYPE_EXTENDED, $configuration, $repository);
    }

    /**
     * Set Amount
     *
     * @param  int $amount
     * @return int
     */
    public function setAmount($amount)
    {
        return $this->loanRequest->setOrderAmount($amount);
    }

    /**
     * Set Reference
     * @param $reference
     * @return string
     */
    public function setReference($reference)
    {
        return $this->loanRequest->setOrderReference($reference);
    }

    /**
     * Set Description
     *
     * @param $description
     * @return string
     */
    public function setDescription($description)
    {
        return $this->loanRequest->setOrderDescription($description);
    }

    /**
     * Set Extendable
     *
     * @param  bool $extendable
     * @return bool
     */
    public function setExtendable($extendable=true)
    {
        return $this->loanRequest->setOrderExtendable($extendable);
    }

    /**
     * Set Validity
     * @param $validity
     * @return int
     */
    public function setValidity($validity)
    {
        return $this->loanRequest->setOrderValidity($validity);
    }

    /**
     * Add Customer
     *
     * @param  string|null $firstName
     * @param  string|null $lastName
     * @param  string|null $email
     * @return bool
     */
    public function setCustomer($firstName=null, $lastName=null, $email=null)
    {
        $additionalData = $this->makeAdditionalData();

        $customer = new CustomType\RequestCustomer();

        if ($firstName !== null)
            $customer->setFirstName($firstName);

        if ($lastName !== null)
            $customer->setLastName($lastName);

        if ($email !== null)
            $customer->setEmail($email);

        $additionalData->setCustomer($customer);

        return true;
    }

    /**
     * Set Customer Current Address
     *
     * @param  string      $buildingNumber
     * @param  string      $postcode
     * @param  string|null $street
     * @param  string|null $town
     * @param  string|null $buildingName
     * @param  string|null $abode
     * @param  string|null $locality
     * @return bool
     */
    public function setAddressCurrent($buildingNumber, $postcode, $street=null, $town=null, $buildingName=null, $abode=null, $locality=null)
    {
        $additionalData = $this->makeAdditionalData();

        $address = new CustomType\Address();

        $address->setBuildingNumber($buildingNumber);
        $address->setPostcode($postcode);

        if ($street !== null)
            $address->setStreet($street);
        if ($town !== null)
            $address->setTown($town);
        if ($buildingName !== null)
            $address->setBuildingName($buildingName);
        if ($abode !== null)
            $address->setAbode($abode);
        if ($locality !== null)
            $address->setLocality($locality);

        $additionalData->setAddressCurrent($address);

        return true;
    }

    /**
     * Set Alternative Fulfilment Address
     *
     * @param  string      $buildingNumber
     * @param  string      $postcode
     * @param  string|null $street
     * @param  string|null $town
     * @param  string|null $buildingName
     * @param  string|null $abode
     * @param  string|null $locality
     * @return bool
     */
    public function setAlternativeFulfilmentAddres($buildingNumber, $postcode, $street=null, $town=null, $buildingName=null, $abode=null, $locality=null)
    {
        $additionalData = $this->makeAdditionalData();

        $address = new CustomType\Address();

        $address->setBuildingNumber($buildingNumber);
        $address->setPostcode($postcode);

        if ($street !== null)
            $address->setStreet($street);
        if ($town !== null)
            $address->setTown($town);
        if ($buildingName !== null)
            $address->setBuildingName($buildingName);
        if ($abode !== null)
            $address->setAbode($abode);
        if ($locality !== null)
            $address->setLocality($locality);

        $additionalData->setAddressFulfilment($address);

        $additionalData->setAlternativeFulfilment();

        return true;
    }

    /**
     * Make / Get Additional Data for Loan Request
     *
     * @return Entity\AdditionalData
     */
    protected function makeAdditionalData()
    {
        if (!($this->additionalData instanceof Entity\AdditionalData))
            $this->additionalData = new Entity\AdditionalData();

        return $this->additionalData;
    }

    public function addOrderItem($sku, $price, $quantity, $description, $fulfillable=true, $gtin=null)
    {
        if (!($this->loanRequest instanceof ExtendedLoanRequest))
            throw new \Exception('Simple checkout, no items allowed');

        $item = new CustomType\OrderItem();

        $item->setSku($sku);
        $item->setPrice($price);
        $item->setQuantity($quantity);
        $item->setDescription($description);
        $item->setFulfillable($fulfillable);
        $item->setGtin($gtin);

        $this->loanRequest->addOrderItem($item);

        return true;
    }

    /**
     * Prepare Loan Request
     *
     * Returns array containing ready Loan Request
     *
     * @return array
     * @throws \Exception
     */
    public function prepareRequest()
    {
        if ($this->loanRequest->getOrderAmount() < 1)
            throw new \Exception('Amount is not set');

        if ($this->loanRequest->getOrderDescription() == '')
            $this->loanRequest->setOrderDescription($this->configuration->getOrderDescription());

        if ($this->loanRequest->getOrderValidity() < time())
            $this->loanRequest->setOrderValidity(time() + $this->configuration->getOrderValidity());

        if ($this->loanRequest->getOrderReference() == '')
            $this->loanRequest->setOrderReference(rand(10,99) . time());

        $ar = [];

        $ar['checkout_version'] = $this->loanRequest->getCheckoutVersion();
        $ar['checkout_type'] = $this->loanRequest->getCheckoutType();
        $ar['merchant_installation'] = $this->loanRequest->getMerchantInstallation();
        $ar['order_description'] = $this->loanRequest->getOrderDescription();
        $ar['order_reference'] = $this->loanRequest->getOrderReference();
        $ar['order_amount'] = $this->loanRequest->getOrderAmount();
        $ar['order_validity'] = date("c", $this->loanRequest->getOrderValidity());
        $ar['order_extendable'] = (int) $this->loanRequest->getOrderExtendable();

        if ($this->additionalData instanceof Entity\AdditionalData)
            $ar['additional_data'] = FieldEncoder::encodeField($this->additionalData->toArray());

        if (
            $this->loanRequest instanceof ExtendedLoanRequest &&
            $this->loanRequest->getOrderItems()
        ) {
            foreach ($this->loanRequest->getOrderItems() as $item) {
                $ar['order_items'][] = $item->toArray();
            }

            $ar['order_items'] = FieldEncoder::encodeField($ar['order_items']);
        }

        $ar['merchant_hash'] = HashGenerator::genHash($ar, $this->configuration->getKey());

        return $ar;
    }

    /**
     * Save Loan Request into Repository
     *
     * @return bool
     */
    public function saveRequest()
    {
        return $this->repository->save($this->loanRequest);
    }

    /**
     * Confirm Sent
     *
     * Action to run once request be successfully sent, updates LoanRequest status to REQUESTED and sets time of request.
     *
     * @param  bool $save
     * @return bool
     */
    public function confirmSent($save=true)
    {
        $this->loanRequest->setStatus(LoanRequestInterface::STATUS_REQUESTED);
        $this->loanRequest->setRequestDate(time());

        if ($save)
            return $this->saveRequest();

        return true;
    }
}
