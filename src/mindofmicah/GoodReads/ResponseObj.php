<?php
namespace mindofmicah\GoodReads;

class ResponseObj
{
    protected $type;
    protected $children = array();
    protected $attr = array();
    public function attr($key = null)
    {
        if (is_null($key)) {
            return $this->attr;
        }
        return $this->attr[$key];
    }
    public function child($key = null)
    {
        if (!is_null($key)) {
            return $this->children[$key];
        }
        return $this->children;
    }
    public function addAttr($key, $value)
    {
        $this->attr[$key] = $value;
    }
    public function addChild($key, $value)
    {
        $this->children[$key][] = $value;
    }
    public static function fromXML($type, $xml)
    {
        $obj = new self($type);
        foreach($xml->attributes() as $k=>$v) {
            $obj->addAttr($k, $v);
        }
        foreach ($xml as $k => $v) {
            $obj->addChild($k, ResponseObj::fromXML($k, $v)); 
        }
        return $obj;
    }

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
