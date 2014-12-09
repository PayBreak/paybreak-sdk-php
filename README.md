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
    
    // Can only be done if the extended checkout is used (i.e. option 2)
    $requestMaker->addOrderItem(
    	"SKU_1", // Stock keeping unit (SKU)
    	20000, // Cost of item
    	1, // Quantity
    	"Item description 1",
    	true, // Is this item fulfillable?
    	"001" // Global Trade Index Number
    );
    
    $requestMaker->addOrderItem(
    	"SKU_2", // Stock keeping unit (SKU)
    	32000, // Cost of item
    	1, // Quantity
    	"Item description 2",
    	true, // Is this item fulfillable?
    	"002" // Global Trade Index Number
    );

    $arr = $requestMaker->prepareRequest();
    print_r($arr);

- The $config object is an implementation of the ConfigurationInterface. You must implement this yourself. The fields represented by this interface are described in the Integration Guide. 
- The $repository is an implementation of the LoanRequestRepositoryInterface. You can implement this if you want to save the loan details in your own database. Alternatively, as shown above, you can inject the NullLoanRequestRepository if you are not interested in saving the loan request data.
- You should use the MakeRequest::make() factory method to generate the object.
- Individual items can be added using the addOrderItem() method.
- The prepareRequest() method returns an array of data that you can POST to our servers, e.g. by using a form. If you are testing, you can POST to `http://checkout-test.paybreak.com`.

