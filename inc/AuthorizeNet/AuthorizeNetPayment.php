<?php
require 'vendor/autoload.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class AuthorizeNetPayment {

    private $APILoginId;
    private $APIKey;
    private $refId;
    private $merchantAuthentication;
    public $responseText;


    public function __construct() {
        require_once "config.php";
        $this->APILoginId = API_LOGIN_ID;
        $this->APIKey = TRANSACTION_KEY;
        $this->refId = 'ref' . time();
        
        $this->merchantAuthentication = $this->setMerchantAuthentication();
        $this->responseText = array("1"=>"Approved", "2"=>"Declined", "3"=>"Error", "4"=>"Held for Review");
    }

    public function setMerchantAuthentication() {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName($this->APILoginId);
        $merchantAuthentication->setTransactionKey($this->APIKey);  
        
        return $merchantAuthentication;
    }
    
    public function setCreditCard( $cardDetails ) {
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber( $cardDetails["u_card_number"] );
        $creditCard->setExpirationDate( $cardDetails["u_year"] . "-" . $cardDetails["u_month"]);
        $paymentType = new AnetAPI\PaymentType();
        $paymentType->setCreditCard($creditCard);
        
        return $paymentType;
    }
    
    public function setTransactionRequestType( $paymentType, $amount ) {
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount( $amount );
        $transactionRequestType->setPayment( $paymentType );
        
        return $transactionRequestType;
    }

    public function chargeCreditCard( $cardDetails ) {
        $paymentType = $this->setCreditCard( $cardDetails );
        $transactionRequestType = $this->setTransactionRequestType( $paymentType, $cardDetails["u_amount"] );

        //Preparing customer information object
        $cust = new AnetAPI\CustomerAddressType();
        $cust->setFirstName($cardDetails['u_first_name']);
        $cust->setLastName($cardDetails['u_last_name']);
        $cust->setAddress($cardDetails['u_street_address']);
        $cust->setCity($cardDetails['u_city']);
        $cust->setState($cardDetails['u_state']);
        //$cust->setCountry($cardDetails['country']);
        $cust->setZip($cardDetails['u_zip_code']);
        $cust->setPhoneNumber($cardDetails['u_phone_number']);
        $cust->setEmail($cardDetails['u_email_address']);

        $transactionRequestType->setBillTo($cust);
        
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication( $this->merchantAuthentication );
        $request->setRefId( $this->refId );
        $request->setTransactionRequest( $transactionRequestType );
        $controller = new AnetController\CreateTransactionController( $request );
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        
        return $response;
    }
}
