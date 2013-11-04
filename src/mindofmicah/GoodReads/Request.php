<?php
namespace mindofmicah\GoodReads;

class Request
{
    public function shelves($action, $parameters, $curl = null)
    {
        if (is_null($curl)) {
            $curl = new Curl();
        }

        $response = Response::buildFromCurlResponse($curl->fetchInfo());

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
