<?php
namespace Tsukanov\SteamLocomotive\Core;

use GuzzleHttp\Client;

class Tool
{

    public function getContent($url)
    {
        $client = new Client();
        $response = $client->get($url);
        return $response->getBody(true);
    }

}
