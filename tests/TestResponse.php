<?php
use mindofmicah\GoodReads\Response;
class TestResponse extends PHPUnit_Framework_TestCase
{
    public function testBasicBuildFromCurl()
    {
        $stub = file_get_contents(__DIR__. '/stubs/sample-response.txt');
        $response = Response::buildFromCurlResponse($stub);
        
        $this->assertInstanceOf('mindofmicah\GoodReads\Response', $response);
    }
    public function testCheckHeaderInformation()
    {
        $response = new Response;
        $this->assertTrue(is_array($response->headers()));
        $this->assertArrayHasKey('key', $response->headers());
        $this->assertArrayHasKey('method', $response->headers());
        $this->assertArrayHasKey('authentication', $response->headers());
    }
}
