Paybreak PHP SDK
================

The Paybreak PHP SDK allows you to easily generate an array of fields that describe a loan request. When these fields 
are POSTed to the Paybreak API, we will generate a page for your customer, providing them with options to customise
their loan package.

Loan Request
------------

The Loan Request allows partial fulfillment of orders, and is described in the Integration Guide.

    use \PayBreak\Sdk\LoanRequest\MakeRequest;
    use \PayBreak\Sdk\LoanRequest\Repository\NullLoanRequestRepository;
    use \PayBreak\Sdk\StandardInterface\Configuration;

    // ...
    
    $config = new Configuration();
    $repository = new NullLoanRequestRepository();
   
    $requestMaker = MakeRequest::make($config, $repository);
    $requestMaker->setReference($uniqueOrderRef);
    $requestMaker->setDescription("description_of_order");
    $requestMaker->setExtendable(false);
    $requestMaker->setValidity($validity);
    $requestMaker->setDeposit(9000);
    $requestMaker->setLoanProducts(["AIN1-3"]);
    $requestMaker->addOrderItem(
    	"SKU_9000", 
    	12000, 
    	2, 
    	"Test description", 
    	true, 
    	"0012345"
    );
    
    // Optional field, to pre-populate Paybreak form with customer data
    $requestMaker->setCustomer(
        "1-1-1984",
        "John", 
        "Smith", 
        "johnsmith@example.com",
        "07654321012",
        "01212123456",
        "A1 B23",
        "Mr"
    );
    
    // Add fulfilment data
    $requestMaker->setFulfilmentType(1);
    $requestMaker->setFulfilmentObject(
        "M1 1AB", 
        "This address is a test...", 
        "RefGoesHere"
    );

    $arr = $requestMaker->prepareRequest();
    print_r($arr);

- The $config object is an implementation of the ConfigurationInterface. You must implement this yourself. The fields represented by this interface are described in the Integration Guide. 
- The $repository is an implementation of the LoanRequestRepositoryInterface. You can implement this if you want to save the loan details in your own database. Alternatively, as shown above, you can inject the NullLoanRequestRepository if you are not interested in saving the loan request data.
- You should use the MakeRequest::make() factory method to generate the object.
- Individual items can be added using the addOrderItem() method.
- The prepareRequest() method returns an array of data that you can POST to our servers, e.g. by using a form. If you are testing, you can POST to `http://checkout-test.paybreak.com`.

