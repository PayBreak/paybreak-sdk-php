<?php

namespace PayBreak\Sdk\Tests;

use PayBreak\Sdk\LoanRequest\MakeRequest;
use PayBreak\Sdk\LoanRequest\Repository\NullLoanRequestRepository;
use PayBreak\Sdk\HashGenerator;
use Carbon\Carbon;

/**
 * Class MakeRequestTest
 * @author Matthew Norris
 * @package PayBreak\Sdk\Tests
 */

class MakeRequestTest extends TestCase {

    /**
     * @var \PayBreak\Sdk\StandardInterface\ConfigurationInterface
     */
    private $configuration;


    private $loanRequestRepository;

    protected function setUp()
    {
        // stops Carbon from whining about the time zone
        date_default_timezone_set('Europe/London');

        // set up Configuration
        $this->configuration = $this->getMock('\PayBreak\Sdk\StandardInterface\ConfigurationInterface');

        // set up LoanRequestRepository
        $this->loanRequestRepository = new NullLoanRequestRepository();
    }

    protected function tearDown()
    {
        $this->configuration = null;
        $this->loanRequestRepository = null;
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::prepareRequest()
     */
    public function testMerchantInstallationException()
    {
        $this->helpTestConfigException("getMerchantInstallation");
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::prepareRequest()
     */
    public function testKeyException()
    {
        $this->helpTestConfigException("getKey");
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::prepareRequest()
     */
    public function testCheckoutVersionException()
    {
        $this->helpTestConfigException("getCheckoutVersion");
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::prepareRequest()
     */
    public function testOrderValidityExceptionFromConfiguration()
    {
        $this->helpTestConfigException("getOrderValidity");
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::prepareRequest()
     */
    public function testOrderDescriptionException()
    {
        $this->helpTestConfigException("getOrderDescription");
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::prepareRequest()
     */
    public function testHashMethodException()
    {
        $this->helpTestConfigException("getHashMethod");
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::prepareRequest()
     */
    private function helpTestConfigException($method)
    {
        $this->setExpectedException('Exception');
        $this->configuration->method($method)->willReturn(null);
        $request = $this->makeFullMakeRequest(1);
        $request->prepareRequest(); // exception emitted here
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::prepareRequest()
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::setAmount()
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::addOrderItem()
     */
    public function testOrderAmountException()
    {
        $this->setExpectedException('Exception');
        $request = $this->makeMakeRequest();
        $request->prepareRequest(); // exception emitted here
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::prepareRequest()
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::addOrderItem()
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::setCustomer()
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::setDeposit()
     * @covers PayBreak\Sdk\LoanRequest\MakeRequest::setLoanProducts()
     */
    public function testPrepareRequest()
    {
        $request = $this->makeFullMakeRequest();
        $request->setReference("asdf1234");
        $request->setValidity(Carbon::create(2014, 12, 1, 0, 0, 0));
        $requestArray = $request->prepareRequest();
        $this->assertEquals([
            "checkout_version" => "3.3",
            "merchant_installation" => "TestInstall",
            "order_description" => "Test order description",
            "order_reference" => "asdf1234",
            "order_amount" => 52000,
            "order_validity" => "2014-12-01T00:00:00+00:00",
            "order_extendable" => 0,
            "additional_data" =>
                "eyJjdXN0b21lciI6eyJkb2IiOiIxOTg0LTEtMSIsImZpcnN0TmFtZSI6IkpvaG4iLCJsYXN0TmFtZSI6IlNtaXRoIiwiZW1haWwiOiJqb2huc21pdGhAZXhhbXBsZS5jb20iLCJwaG9uZU1vYmlsZSI6ImpvaG5zbWl0aEBleGFtcGxlLmNvbSIsInBob25lUGVyc29uYWwiOiJqb2huc21pdGhAZXhhbXBsZS5jb20iLCJwb3N0Y29kZSI6ImpvaG5zbWl0aEBleGFtcGxlLmNvbSJ9fQ==",
            "order_items" =>
                "W3sic2t1IjoiU0tVXzEiLCJndGluIjoiMDAxIiwiZGVzY3JpcHRpb24iOiJJdGVtIGRlc2NyaXB0aW9uIDEiLCJwcmljZSI6MjAwMDAsInF1YW50aXR5IjoxLCJmdWxmaWxsYWJsZSI6dHJ1ZX0seyJza3UiOiJTS1VfMiIsImd0aW4iOiIwMDIiLCJkZXNjcmlwdGlvbiI6Ikl0ZW0gZGVzY3JpcHRpb24gMiIsInByaWNlIjozMjAwMCwicXVhbnRpdHkiOjEsImZ1bGZpbGxhYmxlIjp0cnVlfV0=",
            "deposit" => 1000,
            "loan_products" => "WyJURVNUX1BST0RVQ1QiXQ==",
            "merchant_hash" => "451d2f2d2b62b0dac0a8191361667a855ad69cc5f6314d7c0ed05f2828d36d8a"
        ], $requestArray);
    }

    private function makeFullMakeRequest()
    {
        $maker = $this->makeMakeRequest();

        // Add a couple of dummy order items - needed for checkout type == 2
        $maker->addOrderItem("SKU_1", 20000, 1, "Item description 1", true, "001");
        $maker->addOrderItem("SKU_2", 32000, 1, "Item description 2", true, "002");

        // set some extra fields
        $maker->setCustomer(
            "1984-1-1", "John", "Smith", "johnsmith@example.com", "07654321321", "01234567890", "A1 B23");

        $maker->setDeposit(1000);
        $maker->setLoanProducts(["TEST_PRODUCT"]);
        return $maker;
    }

    private function makeMakeRequest()
    {
        $this->configuration->method("getMerchantInstallation")->willReturn("TestInstall");
        $this->configuration->method("getKey")->willReturn("SharedSecretKey");
        $this->configuration->method("getCheckoutVersion")->willReturn("3.3");
        $this->configuration->method("getCheckoutType")->willReturn(2);
        $this->configuration->method("getOrderExtendable")->willReturn(true);
        $this->configuration->method("getOrderValidity")->willReturn(86400);
        $this->configuration->method("getOrderDescription")->willReturn("Test order description");
        $this->configuration->method("getHashMethod")->willReturn(HashGenerator::TYPE_SHA256);

        $maker = new MakeRequest($this->configuration, $this->loanRequestRepository);
        return $maker;
    }
}
