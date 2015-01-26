<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 23.01.15
 * Time: 13:33
 */

namespace Helpers;


class Request extends \Phalcon\Http\Request {

    private $headers;

    public function __construct(){
        $this->headers = getallheaders();

        // Sprawdzic ta metode. Takie rozwizanie ze wzgledu na format danych przychodzacych z angular.js
        $json = file_get_contents("php://input");
        $_POST = json_decode($json, true);
    }

    public function getAllHeaders(){
        return $this->headers;
    }

    public function getHeaderMod($key){
        return (self::isHeaderSetted($key))? $this->headers[$key] : false;
    }

    public function isHeaderSetted($key){
        return (array_key_exists($key,$this->headers)) ? true : false;
    }

    public function getPostVar($key, $filters=null, $defaultValue=null, $notAllowEmpty=null, $noRecursive=null){
        return $this->getPost($key, $filters, $defaultValue, $notAllowEmpty, $noRecursive);
    }

} 