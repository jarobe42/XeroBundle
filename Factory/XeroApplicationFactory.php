<?php

namespace Jarobe\XeroBundle\Factory;

use XeroPHP\Application;

class XeroApplicationFactory
{
    const TYPE_PRIVATE = "PRIVATE";
    const TYPE_PARTNER = "PARTNER";
    const TYPE_PUBLIC = "PUBLIC";

    public static function create($applicationType, $config)
    {
        switch(strtoupper($applicationType)){
            case self::TYPE_PRIVATE:
                return new Application\PrivateApplication($config);
                break;
            case self::TYPE_PUBLIC:
                return new Application\PublicApplication($config);
                break;
            case self::TYPE_PARTNER:
                return new Application\PartnerApplication($config);
                break;
        }
        return;
    }
}
