<?php
namespace mindofmicah\GoodReads;

class Response
{
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
}
