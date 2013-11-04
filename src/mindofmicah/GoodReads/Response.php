<?php
namespace mindofmicah\GoodReads;

class Response
{
    protected $headers = array(
        'key'=>null, 
        'method'=>null, 
        'authentication' => null
    
    );
    protected $properties = array(
        'shelves' => array()
    );
    
    public function setProperty($property, $value)
    {
        $this->properties[$property] = $value;
    }

    public function get($key)
    {
        return $this->properties[$key];
    }
    public static function buildFromCurlResponse($response)
    {
        $response = new self;
        return $response;
    }
    
    public function headers()
    {
        return $this->headers;    
    }
}
