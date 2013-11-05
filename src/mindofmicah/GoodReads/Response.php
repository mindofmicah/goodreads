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

    public function appendToProperty($property, $entry)
    {
        $this->properties[$property][] = $entry;
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

        foreach ($t as $k=>$v) {
            if ($k == 'Request') {
                foreach ($t->Request[0] as $k=>$v) {
                    $response->setHeader($k, $v);
                }
            } else {
                
                $obj = ResponseObj::fromXML($k, $v);
                $response->setProperty($k, $obj); 
//                echo $k.'.'. print_r($v, 1) ."\n";
            }
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
