<?php
namespace PayBreak\Sdk\Tests;

use PayBreak\Sdk\LoanRequest\Entity\SimpleLoanRequest;

class SimpleLoanRequestTest extends TestCase {

    protected function setUp()
    {
        $this->loanRequest = new SimpleLoanRequest();
    }

    protected function tearDown()
    {
        $this->loanRequest = null;
    }

    /**
     * @author Matthew Norris
     * @covers PayBreak\Sdk\LoanRequest\Entity\SimpleLoanRequest::getCheckoutType()
     */
    public function testGetCheckoutType()
    {
        $this->assertEquals(SimpleLoanRequest::TYPE_SIMPLE, $this->loanRequest->getCheckoutType());
    }
}
