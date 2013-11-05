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

        return $response;
    }
	public function __construct()
	{
		echo 'hi';
	}
}
