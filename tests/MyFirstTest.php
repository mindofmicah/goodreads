<?php
use mindofmicah\GoodReads\Request;
use mindofmicah\GoodReads\ResponseObj;
use Mockery as m;

class MyFirstTest extends PHPUnit_Framework_TestCase
{
    public function testItWorks()
    {
        $mock = M::mock('mindofmicah\GoodReads\Curl');
        $mock->shouldReceive('fetchInfo')->once()->andReturn(file_get_contents(__DIR__ . '/stubs/shelves/list.txt'));
        $response = Request::shelves('list', array(
            'id' => 21308373
        ), $mock);

        $this->assertInstanceOf('mindofmicah\GoodReads\Response', $response);
        $this->assertInstanceOf('mindofmicah\GoodReads\ResponseObj',($response->get('shelves')));

        $this->assertEquals('shelf_list', $response->headers('method'));
        $first_shelf = $response->get('shelves');
        $this->assertInstanceOf('mindofmicah\GoodReads\ResponseObj', $first_shelf);
        $first_child = current($first_shelf->child());
//        print_r($first_child);
        $this->assertEquals('user_shelf', $first_child[0]->getType());
        $this->assertEquals(1, count($response->get('shelves')));

    }
}
