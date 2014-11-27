<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\LoanRequest;

use Carbon\Carbon;
use PayBreak\Sdk\CustomType;
use PayBreak\Sdk\FieldEncoder;
use PayBreak\Sdk\HashGenerator;
use PayBreak\Sdk\LoanRequest\Entity\ExtendedLoanRequest;
use PayBreak\Sdk\LoanRequest\Entity\FulfilmentObject;
use PayBreak\Sdk\LoanRequest\Entity\LoanRequestInterface;
use PayBreak\Sdk\LoanRequest\Repository\LoanRequestRepositoryInterface;
use PayBreak\Sdk\StandardInterface\ConfigurationInterface;

/**
 * Class MakeRequest
 * Generates a request array structure, which can be POSTed to the appropriate Paybreak endpoint
 *
 * @author WN
 * @author Matthew Norris
 *
 * @package PayBreak\Sdk\LoanRequest
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
     * @param string $reference
     * @return string
     */
    public function setReference($reference)
    {
        return $this->loanRequest->setOrderReference($reference);
    }

    /**
     * Set Description
     *
     * @param string $description
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
     * Add customer data to the request
     *
     * @param string|null $dob Customer's date of birth (YYYY-MM-DD)
     * @param string|null $firstName Customer's first name
     * @param string|null $lastName Customer's last name
     * @param string|null $email Customer's email
     * @param string|null $phoneMobile Customer's mobile phone number.
     * @param string|null $phonePersonal Customer's personal phone number.
     * @param string|null $postcode Customer's postcode
     * @param string|null $title Customer's title
     * @return bool
     */
    public function setCustomer(
        $dob            = null,
        $firstName      = null,
        $lastName       = null,
        $email          = null,
        $phoneMobile    = null,
        $phonePersonal  = null,
        $postcode       = null,
        $title          = null
    ) {
        $additionalData = $this->makeAdditionalData();

        $customer = new CustomType\RequestCustomer();

        if ($dob !== null)
            $customer->setDob($dob);
        if ($firstName !== null)
            $customer->setFirstName($firstName);
        if ($lastName !== null)
            $customer->setLastName($lastName);
        if ($email !== null)
            $customer->setEmail($email);
        if ($phoneMobile !== null)
            $customer->setPhoneMobile($email);
        if ($phonePersonal !== null)
            $customer->setPhonePersonal($email);
        if ($postcode !== null)
            $customer->setPostcode($email);
        if ($title !== null)
            $customer->setTitle($title);

        $additionalData->setCustomer($customer);

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

    /**
     * Add a single order item
     *
     * @param $sku Stock-keeping unit
     * @param $price Price of item
     * @param $quantity Number of items in order
     * @param $description Description of item
     * @param bool $fulfillable Whether the item is fulfillable
     * @param null $gtin Global Trade Index Number (GTIN)
     * @throws \Exception
     */
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
    }

    /**
     * @author Matthew Norris
     * @param int $value The fulfilment type (0 | 1 | 2)
     * @return int
     */
    public function setFulfilmentType($value)
    {
        $this->loanRequest->setFulfilmentType($value);
        return $value;
    }

    /**
     * Set the fulfilment object
     * @author Matthew Norris
     *
     * @param $postcode Fulfilment postcode
     * @param $address Fulfilment address
     * @param $reference The reference (for collecting items with fulfilmentType == 2)
     */
    public function setFulfilmentObject($postcode, $address, $reference = null)
    {
        $fulfilmentObject = new FulfilmentObject();

        $fulfilmentObject->setPostcode($postcode);
        $fulfilmentObject->setAddress($address);
        $fulfilmentObject->setReference($reference);

        $this->loanRequest->setFulfilmentObject($fulfilmentObject);
    }

    /**
     * @author Matthew Norris
     * @param int $deposit The deposit, in pence.
     * @return int
     */
    public function setDeposit($deposit)
    {
        $this->loanRequest->setDeposit($deposit);
        return $deposit;
    }

    /**
     * @author Matthew Norris
     * @param array $loanProducts Array of loan product IDs, as strings.
     * @return array
     */
    public function setLoanProducts(array $loanProducts) {
        $this->loanRequest->setLoanProducts($loanProducts);
        return $loanProducts;
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
        // Do some checks. Some fields are essential - if they're missing, you will get an exception.
        $errors = [];
        if (!$this->loanRequest->getCheckoutVersion()) {
            $errors[] = 'Checkout version not set.';
        }

        if (!$this->loanRequest->getMerchantInstallation()) {
            $errors[] = 'Merchant installation not set.';
        }

        // default to the order description in Configuration
        if ($this->loanRequest->getOrderDescription() == '') {
            if (!$this->configuration->getOrderDescription()) {
                $errors[] = 'Order description not set in loan request or Configuration';
            } else {
                $this->loanRequest->setOrderDescription($this->configuration->getOrderDescription());
            }
        }

        // Set a random order reference if it's not already set
        if ($this->loanRequest->getOrderReference() == '') {
            $this->loanRequest->setOrderReference(rand(10, 99) . time());
        }

        if ($this->loanRequest->getOrderAmount() < 1) {
            $errors[] = 'Amount not set. ';
        }

        if (!$this->loanRequest->getOrderValidity()) {
            if (!$this->configuration->getOrderValidity()) {
                $errors[] = 'Order validity not set in loan request or Configuration object.';
            } else {
                $this->loanRequest->setOrderValidity(
                    Carbon::now()->addSeconds($this->configuration->getOrderValidity()));
            }
        }

        if (!$this->configuration->getKey()) {
            $errors[] = 'Key must be set in Configuration.';
        }

        if (!$this->configuration->getHashMethod()) {
            $errors[] = 'Hash method must be set in Configuration.';
        }

        if ( $this->loanRequest->getCheckoutType() == 2 &&
            !$this->loanRequest->getOrderItems()) {

            $errors[] = 'Order items must be set when checkoutType == 2.';
        }

        if ($errors) {
            throw new \Exception('Some fields were missing:\n'.implode('\n', $errors));
        }

        $ar = [];

        // Add various fields to the output.
        $ar['checkout_version'] = $this->loanRequest->getCheckoutVersion();
        $ar['checkout_type'] = $this->loanRequest->getCheckoutType();
        $ar['merchant_installation'] = $this->loanRequest->getMerchantInstallation();
        $ar['order_description'] = $this->loanRequest->getOrderDescription();
        $ar['order_reference'] = $this->loanRequest->getOrderReference();
        $ar['order_amount'] = $this->loanRequest->getOrderAmount();
        $ar['order_validity'] = date("c", $this->loanRequest->getOrderValidity()->timestamp);
        $ar['order_extendable'] = (int) $this->loanRequest->getOrderExtendable();

        if ($this->additionalData instanceof Entity\AdditionalData)
            $ar['additional_data'] = FieldEncoder::encodeField($this->additionalData->toArray());

        // If there are order items, add them to the output
        if (
            $this->loanRequest instanceof ExtendedLoanRequest &&
            $this->loanRequest->getOrderItems()
        ) {
            foreach ($this->loanRequest->getOrderItems() as $item) {
                $itemArray = $item->toArray();
                unset($itemArray["fulfilled"]);
                $ar['order_items'][] = $itemArray;
            }

            $ar['order_items'] = FieldEncoder::encodeField($ar['order_items']);
        }

        $fulfilmentType = $this->loanRequest->getFulfilmentType();
        $fulfilmentObject = $this->loanRequest->getFulfilmentObject();

        // If alternative fulfilment data exists, add it to the output.
        if (
            $fulfilmentType != LoanRequestInterface::FULFILMENT_TYPE_STANDARD &&
            !is_null($fulfilmentObject)
        ) {
            $ar['fulfilment_object'] = FieldEncoder::encodeField($fulfilmentObject->toArray());
            $ar['fulfilment_type'] = $this->loanRequest->getFulfilmentType();
        }

        // If there's a deposit, add it to the output
        $deposit = $this->loanRequest->getDeposit();
        if ($deposit > 0) {
            $ar["deposit"] = $deposit;
        }

        if ($this->loanRequest->getLoanProducts()) {
            $ar["loan_products"] = FieldEncoder::encodeField($this->loanRequest->getLoanProducts());
        }

        // Must sort by keys, alphabetically, to get a consistent hash.
        // ksort($ar); // no need - HashGenerator does the sorting for you
        $ar['merchant_hash'] = HashGenerator::genHash(
            $ar,
            $this->configuration->getKey(),
            $this->configuration->getHashMethod()
        );

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
