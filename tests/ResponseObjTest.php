<?php
use mindofmicah\GoodReads\ResponseObj;
use Mockery as m;

class ResponseObjTest extends PHPUnit_Framework_TestCase
{
    public function testFromXML()
    {
        $expected_type = 'taco';
        $response_obj = ResponseObj::fromXML($expected_type, new SimpleXMLElement(file_get_contents(__DIR__.'/stubs/responseobj/basic.txt')));    
        $this->assertInstanceOf('mindofmicah\GoodReads\ResponseObj', $response_obj);
        $this->assertEquals($expected_type, $response_obj->getType());
        $this->assertTrue(is_array($response_obj->attr()));
        $this->assertArrayHasKey('apple-key', $response_obj->attr());
        $this->assertEquals('apple-val', $response_obj->attr('apple-key'));
        $this->assertTrue(is_array($response_obj->child()));
        $this->assertArrayHasKey('child', $response_obj->child());

        $child_obj = $response_obj->child('child');
        $this->assertTrue(is_array($response_obj->child('child')), $child_obj);
        $this->assertEquals(1, count($child_obj));
        $this->assertInstanceOf('mindofmicah\goodReads\ResponseObj', $child_obj[0]);

    }
}
