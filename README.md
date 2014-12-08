Paybreak PHP SDK
================

The Paybreak PHP SDK allows you to easily generate an array of fields that describe a loan request. When these fields 
are POSTed to the Paybreak API, we will generate a page for your customer, providing them with options to customise
their loan package.

Loan Request
------------

The Loan Request allows partial fulfillment of orders, and is described in the Integration Guide:

    use \PayBreak\Sdk\LoanRequest\MakeRequest;
    use \PayBreak\Sdk\LoanRequest\Repository\NullLoanRequestRepository;
    use \PayBreak\Sdk\StandardInterface\Configuration;

    // ...
    
    $config = new Configuration();
    $repository = new NullLoanRequestRepository();
   
    $request = MakeRequest::make($config, $repository);
    $request->setAmount(50000);
    $request->setReference($uniqueOrderRef);
    $request->setDescription("description_of_order");
    $request->setExtendable(false);
    $request->setValidity($validity);
    
    // Can only be done if the extended checkout is used (i.e. option 2)
    $request->addOrderItem(
    	"SKU_1", // Stock keeping unit (SKU)
    	20000, // Cost of item
    	1, // Quantity
    	"Item description 1",
    	true, // Is this item fulfillable?
    	"001" // Global Trade Index Number
    );
    
    $request->addOrderItem(
    	"SKU_2", // Stock keeping unit (SKU)
    	32000, // Cost of item
    	1, // Quantity
    	"Item description 2",
    	true, // Is this item fulfillable?
    	"002" // Global Trade Index Number
    );

    $arr = $request->prepareRequest();
    print_r($arr);

There are a few things to note here:

- You should use the MakeRequest::makeSimple() factory method to generate the object.
- The $config object is an implementation of the ConfigurationInterface. You must implement this yourself. The fields
 represented by this interface are described in the Integration Guide. 
- The $repository is an implementation of the LoanRequestRepositoryInterface. You can implement this if you want to 
save the loan details in your own database. Alternatively, as shown above, 
you can inject the NullLoanRequestRepository if you are not interested in saving the loan request data.
- The prepareRequest() method returns an array of data that you can POST to our servers, 
e.g. by using a form. If you are testing, you can POST to `http://checkout-test.paybreak.com`.
- MakeRequest::makeExtended() is used to generate the object.
- Individual items can be added using the addOrderItem() method.
