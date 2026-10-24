<?php
namespace Tsukanov\SteamLocomotive\Core;

use GuzzleHttp\Client;

class Tool
{

    /**
     * @param string $url
     * @return string Response body
     */
    public function getContent($url)
    {
        $client = new Client();
        $response = $client->get($url);
        return (string) $response->getBody();
    }

}
