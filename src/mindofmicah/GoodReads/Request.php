<?php
namespace mindofmicah\GoodReads;

class Request
{
    public function shelves($action, $parameters)
    {
        $response = new Response;
        $response->setProperty('shelves', array(
            new ResponseObj('user_shelf'),
            new ResponseObj('user_shelf'),
            new ResponseObj('user_shelf'),
            new ResponseObj('user_shelf'),
            new ResponseObj('user_shelf'),
            new ResponseObj('user_shelf'),
            new ResponseObj('user_shelf'),
        ));
        return $response;
    }
	public function __construct()
	{
		echo 'hi';
	}
}
