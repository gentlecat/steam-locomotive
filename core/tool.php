<?php
namespace Locomotive\Tools;

use Guzzle\Http\Client;

class Tool
{

    public function getContent($url)
    {
        $client = new Client($url);
        $request = $client->get();
        $response = $request->send();

        return $response->getBody(true);
    }

}