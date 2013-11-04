<?php
use mindofmicah\GoodReads\Request;
use Mockery as m;

class MyFirstTest extends PHPUnit_Framework_TestCase
{
    public function testItWorks()
    {
        $mock = M::mock('mindofmicah\GoodReads\Curl');
        $mock->shouldReceive('fetchInfo')->once()->andReturn('tacos');
        $response = Request::shelves('list', array(
            'id' => 21308373
        ), $mock);

        $this->assertInstanceOf('mindofmicah\GoodReads\Response', $response);
        $this->assertTrue(is_array($response->get('shelves')));

        $first_shelf = current($response->get('shelves'));
        $this->assertInstanceOf('mindofmicah\GoodReads\ResponseObj', $first_shelf);
        $this->assertEquals('user_shelf', $first_shelf->getType());
        $this->assertEquals(7, count($response->get('shelves')));

    }
}
