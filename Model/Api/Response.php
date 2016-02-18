<?php
/**
 * Created by James Robertson
 * Date: 6/03/15
 * Time: 11:03 AM
 */

namespace Jarobe\XeroBundle\Model\Api;

class Response {
    /**
     * @var XeroOAuth $api
     */
    protected $api;
    protected $data;
    protected $code;
    protected $response;

    public function __construct($api, $data)
    {
        $this->api = $api;
        $this->data;
        $this->code = isset($data['code']) ?$data['code'] : null;

        if(isset($data['response'])){
            if(self::isJson($data['response'])){
                $this->response = json_decode($data['response'], true);
            } else {
                $this->response = $data['response'];
            }
        }

    }

    public function getData()
    {
        return $this->data;
    }

    public function getCode(){
        return $this->code;
    }

    public function getResponse(){
        return $this->response;
    }

    /**
     * @return string
     */
    public function getResponseMessage()
    {
        $responseString = $this->getResponse();
        if (is_array($responseString)) {
            $responseString = json_encode($responseString);
        }

        return $responseString;
    }

    public function getModelData($key){
        if(isset($this->response[$key])){
            return $this->response[$key];
        }
        return null;
    }
    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getCode() == 200;
    }

    private static function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
