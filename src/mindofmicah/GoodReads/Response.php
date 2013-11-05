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
    public function setHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    public function get($key)
    {
        return $this->properties[$key];
    }
    public static function buildFromCurlResponse($curl_response)
    {
        $response = new self;
        $t = new \SimpleXMLElement($curl_response);
        foreach ($t->Request[0] as $k=>$v) {
            $response->setHeader($k, $v);
        }
        return $response;
    }
    
    public function headers($key = null)
    {
        if (is_null($key)) {
           return $this->headers;    
        }
        return $this->headers[$key];
    }
}
