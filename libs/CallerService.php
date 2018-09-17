<?php
/****************************************************
CallerService.php

This file uses the constants.php to get parameters needed to make an API call and calls the server.if you want use your own credentials, you have to change the constants.php

Called by TransactionDetails.php, ReviewOrder.php, DoDirectPaymentReceipt.php and DoExpressCheckoutPayment.php.

****************************************************/
set_time_limit(0);

require_once 'constants.php';

$api_userName = API_USERNAME;
$api_password = API_PASSWORD;
$api_signature = API_SIGNATURE;
$api_endpoint = API_ENDPOINT;
$version = VERSION;

//session_start();

/**
  * hash_call: Function to perform the API call to PayPal using API signature
  * @methodName is name of API  method.
  * @nvpStr is nvp string.
  * returns an associtive array containing the response from the server.
*/


public function hash_call($methodName, $nvpStr)
{
    //declaring of global variables
    global $api_endpoint, $version, $api_userName, $api_password, $api_signature, $nvp_Header;

    //setting the curl parameters.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_endpoint);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);

    //turning off the server and peer verification(TrustManager Concept).
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    //if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
   //Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php 
    if (USE_PROXY) {
        curl_setopt ($ch, CURLOPT_PROXY, PROXY_HOST . ":" . PROXY_PORT); 
    }
    //NVPRequest for submitting to server
    $nvpReq = "METHOD=" . urlencode($methodName) . "&VERSION=" . urlencode($version)."&PWD=" . urlencode($api_password) .
        "&USER=" . urlencode($api_userName) . "&SIGNATURE=" . urlencode($api_signature) . $nvpStr;

    //setting the nvpReq as POST FIELD to curl
    curl_setopt($ch,CURLOPT_POSTFIELDS,$nvpReq);

    //getting response from server
    $response = curl_exec($ch);

    //convrting NVPResponse to an Associative Array
    $nvpResArray = deformatNVP($response);
    $nvpReqArray = deformatNVP($nvpReq);
    $_SESSION['nvpReqArray'] = $nvpReqArray;

    if (curl_errno($ch)) {
        // moving to display page to display curl errors
        $_SESSION['curl_error_no'] = curl_errno($ch) ;
        $_SESSION['curl_error_msg'] = curl_error($ch);
        $location = "APIError.php";
        header("Location: $location");
    } else {
        //closing the curl service
        curl_close($ch);
    }
    return $nvpResArray;
}

/** This function will take NVPString and convert it to an Associative Array and it will decode the response.
  * It is usefull to search for a particular key and displaying arrays.
  * @nvpstr is NVPString.
  * @nvpArray is Associative Array.
  */

public function deformatNVP($nvpStr)
{
    $intial = 0;
    $nvpArray = array();
    while (strlen($nvpStr)) {
        //postion of Key
        $keypos = strpos($nvpStr, '=');
        //position of value
        $valuepos = strpos($nvpStr, '&') ? strpos($nvpStr, '&') : strlen($nvpStr);

        /*getting the Key and Value values and storing in a Associative Array*/
        $keyval = substr($nvpStr, $intial, $keypos);
        $valval = substr($nvpStr, $keypos+1, $valuepos-$keypos-1);

        //decoding the respose
        $nvpArray[urldecode($keyval)] = urldecode($valval);
        $nvpStr = substr($nvpStr, $valuepos+1, strlen($nvpStr));
    }
    return $nvpArray;
}
