<?php
/**
 * Created by James Robertson
 * Date: 5/03/2015
 * Time: 2:42 PM
 */

namespace Jarobe\XeroBundle\Service;

use Jarobe\XeroBundle\Model\Accounting\Invoice;
use Jarobe\XeroBundle\Model\Api\Response;
use Jarobe\XeroBundle\Util\XMLConverter;
use SimpleXMLElement;

class XeroService {

    private $config;

    private $api;

    public function __construct($key, $secret, $applicationType, $oauthCallback, $privateKey, $publicKey, $userAgent){
       $this->config = [
           'consumer_key'       => $key,
           'shared_secret'      => $secret,
           // API versions
           'core_version'       => '2.0',
           'payroll_version'    => '1.0',
           'file_version'       => '1.0' ,
           'application_type'  => $applicationType,
           'oauth_callback'    => $oauthCallback,
           'rsa_private_key'   => $privateKey,
           'rsa_public_key'    => $publicKey,
           'user_agent'        => $userAgent,
        ];

        if($applicationType == "Private"){
            $this->config['access_token'] = $key;
            $this->config['access_token_secret'] = $secret;
        }
        $this->api = new \XeroOAuth($this->config);
    }

    /**
     * @return \XeroOAuth
     */
    public function getApi(){
        return $this->api;
    }

    /**
     * @param Invoice $invoice
     * @return string|null
     */
    public function postInvoice(Invoice $invoice){
        if($invoice->isValid()){
            $key = "Invoices";
            $url = $this->api->url($key);

            $putData = [$key =>
                [
                    "Invoice" => $invoice->toArray()
                ]
            ];

            $xml =  XMLConverter::getXml($key, $putData)->asXML();

            $data = $this->api->request("POST", $url, [],$xml, "json");

            $response = new Response($this->api, $data);

            if($response->isSuccessful()){
                $invoiceData = $response->getModelData($key);
                if($invoiceData != null){
                    foreach($invoiceData as $invoiceResponse){
                        return $invoiceResponse["InvoiceID"];
                    }
                }
            }
        }
        return null;
    }
}