<?php
/**
 * 
 * The MIT License (MIT)
 * Copyright (c) 2015 Phillip Shipley
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without
 * limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
 * of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following
 * conditions:
 *
 * @category    Ced
 * @package     Ced_Walmart
 * @author 		CedCommerce Core Team <connect@cedcommerce.com>
 * @copyright   Copyright CedCommerce (http://cedcommerce.com/)
 */

namespace frontend\modules\walmart\components;

use Yii;
use yii\base\Component;
use phpseclib\Crypt\RSA;

class Signature extends component
{
    /**
    * @var string Consumer ID provided by Developer Portal
    */
    public $consumerId;
    /**
     * @var string Base64 Encoded Private Key provided by Developer Portal
     */
    public $privateKey;
    /**
     * @var string URL of API request being made
     */
    public $requestUrl;
    /**
     * @var string HTTP request method for API call (GET/POST/PUT/DELETE/OPTIONS/PATCH)
     */
    public $requestMethod;

    /**
     * @var integer timestamp of certificate generation
     */
    public $timestamp;

    /*public function __construct(
        \Magento\Framework\App\Helper\Context $context
    )
    {
        parent::__construct($context);
    }

*/
    /**
     * Get signature with optional timestamp. If using Signature class as object, you can repeatedly call this
     * method to get a new signature without having to provide $consumerId, $privateKey, $requestUrl, $requestMethod
     * every time.
     * @param $requestUrl
     * @param null $consumerId
     * @param null $privateKey
     * @param null $requestMethod
     * @param null $timestamp
     * @return string
     */
    public function getSignature(
         $requestUrl,
         $requestMethod='GET',
         $consumerId=null,
         $privateKey=null,
         $timestamp=null
    )
    {

//      $this->requestUrl = 'http://marketplace.walmartapis.com/' . $requestUrl;
        $this->requestUrl = "https://marketplace.walmartapis.com/" . $requestUrl;
        $this->requestMethod =  $requestMethod;
        $this->consumerId = $consumerId;
        $this->privateKey = $privateKey;
        $this->timestamp = $timestamp;
        //echo  $this->requestUrl."<br>".$this->requestMethod."<br>".$this->consumerId."<br>".$this->privateKey."<br>".$this->timestamp;
       
        if(is_null($this->timestamp) || !is_numeric($this->timestamp)){
            $this->timestamp = $this->getMilliseconds();
        }
         //echo $this->timestamp;
        return $this->calculateSignature(
            $this->requestUrl,
            $this->requestMethod,
            $this->consumerId,
            $this->privateKey,
            $this->timestamp
        );
    }

    /**
     * Static method for quick calls to calculate a signature.
     * @link https://developer.walmartapis.com/#authentication
     * @param string $consumerId
     * @param string $privateKey
     * @param string $requestUrl
     * @param string $requestMethod
     * @param string|null $timestamp
     * @return string
     * @throws \Exception
     */

    public function calculateSignature($requestUrl, $requestMethod, $consumerId, $privateKey, $timestamp=null)
    {
        $this->timestamp = $timestamp;
        if(is_null($this->timestamp) || !is_numeric($this->timestamp)){
            $this->timestamp = $this->getMilliseconds();
        }

        /**
         * Append values into string for signing
         */
        $message = $consumerId."\n".$requestUrl."\n".strtoupper($requestMethod)."\n".$this->timestamp."\n";
		//echo $message;die;
        /**
         * Get RSA object for signing
         */
        $rsa = new RSA();
        $decodedPrivateKey = base64_decode($privateKey);
        $rsa->setPrivateKeyFormat(RSA::PRIVATE_FORMAT_PKCS8);
        $rsa->setPublicKeyFormat(RSA::PRIVATE_FORMAT_PKCS8);

        /**
         * Load private key
         */
        try {
                if($rsa->loadKey($decodedPrivateKey, RSA::PRIVATE_FORMAT_PKCS8)) 
                {
                    /**
                     * Make sure we use SHA256 for signing
                     */
                    $rsa->setHash('sha256');
                    $rsa->setSignatureMode(RSA::SIGNATURE_PKCS1);
                    $signed = $rsa->sign($message);
                    /**
                     * Return Base64 Encode generated signature
                     */
                    return base64_encode($signed);
                }

                else {
                    throw new \Exception("Unable to load private key");
                }
        }
        catch (\Exception $e){
            return $e;
        }
    }

    /**
     * Get current timestamp in milliseconds
     * @return float
     */
    public function getMilliseconds()
    {
        return number_format(round(microtime(true) * 1000),0,'','');
    }
}
