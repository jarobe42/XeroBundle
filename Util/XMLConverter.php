<?php
/**
 * Created by James Robertson
 * Date: 6/03/15
 * Time: 1:21 PM
 */

namespace Jarobe\XeroBundle\Util;

use SimpleXMLElement;

class XMLConverter {
    /**
     * @param $array
     * @param $xml
     */
    public static function arrayToXml($array, &$xml){
        foreach($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xml->addChild("$key");
                    self::arrayToXml($value, $subnode);
                } else {
                    self::arrayToXml($value, $xml);
                }
            } else {
                $xml->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

    /**
     * @param $root
     * @param $data
     * @return SimpleXMLElement
     */
    public static function getXml($root, $data){
        // creating object of SimpleXMLElement
        if(isset($data[$root])){
            $data = $data[$root];
        }
        $xml_data = new SimpleXMLElement("<?xml version=\"1.0\"?><$root></$root>");

        // function call to convert array to xml
        self::arrayToXml($data,$xml_data);
        return $xml_data;
    }
}