<?php
namespace Tsukanov\SteamLocomotive\Core;

use GuzzleHttp\Client;

define('WEB_API_HOSTNAME', 'api.steampowered.com');
define('PROTOCOL', 'https');

class WebInterface
{

    public function get($interface, $method, $version, $parameters = array())
    {
        $url = PROTOCOL . '://' . WEB_API_HOSTNAME . '/' . $interface . '/' . $method . '/v' . $version . '/';

        $query = array();
        $api_key = $GLOBALS['LOCOMOTIVE_API_KEY'] ?? null;
        if ($api_key != null) {
            $query['key'] = $api_key;
        }
        $query = array_merge($query, self::parseParameters($parameters));

        $client = new Client();
        $response = $client->get($url, array('query' => $query));

        if ($response->getStatusCode() == 200) {
            return json_decode((string) $response->getBody());
        }
    }

    private function parseParameters($parameters = array())
    {
        return array_filter($parameters, function ($val) {
            return !is_null($val);
        });
    }

    function getClassName($object)
    {
        $class = get_class($object);
        $namespace_end = strrpos($class, '\\');
        if ($namespace_end) {
            // Removing namespace
            return $name = substr($class, $namespace_end + 1);
        } else {
            return $class;
        }
    }

}
