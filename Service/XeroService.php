<?php

namespace Jarobe\XeroBundle\Service;

use Jarobe\XeroBundle\Factory\XeroApplicationFactory;

class XeroService
{
    private $config;

    private $apiManager;

    public function __construct($key, $secret, $applicationType, $oauthCallback, $privateKey, $publicKey, $userAgent)
    {
        $this->config = [
           'oauth' => [
               'consumer_key' => $key,
               'consumer_secret' => $secret,
               'callback' => $oauthCallback,
               'rsa_private_key' => $privateKey,
               'rsa_public_key' => $publicKey,
           ],
        ];

        $this->apiManager = XeroApplicationFactory::create($applicationType, $this->config);
    }

    public function getApiManager()
    {
        return $this->apiManager;
    }
}
