<?php

namespace Jarobe\XeroBundle\Tests\Service;

use Jarobe\XeroBundle\Service\XeroService;

class XeroServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testNewInstance()
    {
        $key = 'key';
        $secret = 'secret';
        $applicationType = 'type';
        $callback = 'callback';
        $privateKey = 'privateKey';
        $publicKey = 'publicKey';
        $userAgent = 'userAgent';

        new XeroService($key, $secret, $applicationType, $callback, $privateKey, $publicKey, $userAgent);
    }
}
