<?php
namespace mindofmicah\GoodReads;

class ResponseObj
{
    protected $type;
    protected $children;

    public function __set($key, $value)
    {
        $this->$children[$key] = $value;
    }

    public function getType()
    {
        return $this->type;
    }
    public function __construct($type)
    {
        $this->type = $type;
    }
}
