<?php
namespace Tsukanov\SteamLocomotive\Core;

use Guzzle\Http\Client;

define('WEB_API_HOSTNAME', 'api.steampowered.com');
define('PROTOCOL', 'https');

class WebInterface
{

    public function get($interface, $method, $version, $parameters = array())
    {
        $url = '/' . $interface . '/' . $method . '/v' . $version . '/?';
        if ($GLOBALS['LOCOMOTIVE_API_KEY'] != null) {
            $url .= 'key=' . $GLOBALS['LOCOMOTIVE_API_KEY'];
        }

        $client = new Client(PROTOCOL . '://' . WEB_API_HOSTNAME);
        $request = $client->get($url . self::parseParameters($parameters));
        $response = $request->send();

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(true));
        }
    }

    private function parseParameters($parameters = array())
    {
        $param_keys = array_keys($parameters);
        $result = '';
        foreach ($param_keys as $key) {
            $val = $parameters[$key];
            if (!is_null($val)) {
                $result = $result . '&' . $key . '=' . $val;
            }
        }
        return $result;
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