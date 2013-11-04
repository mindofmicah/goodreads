<?php
use mindofmicah\GoodReads\Response;
class TestResponse extends PHPUnit_Framework_TestCase
{
    public function testBasicBuildFromCurl()
    {
        $stub = file_get_contents(__DIR__. '/stubs/sample-response.txt');
        $response = Response::buildFromCurlResponse($stub);
        
        $this->assertInstanceOf('mindofmicah\GoodReads\Response', $response);
        $this->assertEquals('true', $response->headers('authentication'));
        $this->assertEquals('method-name', $response->headers('method'));
        $this->assertEquals('secret-key', $response->headers('key'));
    }
    public function testCheckHeaderInformation()
    {
        $response = new Response;
        $this->assertTrue(is_array($response->headers()));
        $this->assertArrayHasKey('key', $response->headers());
        $this->assertNull($response->headers('key'));
        $this->assertArrayHasKey('method', $response->headers());
        $this->assertNull($response->headers('method'));
        $this->assertArrayHasKey('authentication', $response->headers());
        $this->assertNull($response->headers('authentication'));
    }

    public function testSetHeadingAttribute()
    {
        $response = new Response;
        $response->setHeader('key', 'apples');
        $this->assertEquals('apples', $response->headers('key'));
    }
}
