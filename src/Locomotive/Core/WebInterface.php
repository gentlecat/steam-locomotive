<?php
namespace Locomotive\Core;

use Guzzle\Http\Client;

define('WEB_API_HOSTNAME', 'api.steampowered.com');
define('PROTOCOL', 'https');

class WebInterface
{

    public function get($interface, $method, $version, $parameters = array())
    {
        $path = '/' . $interface . '/' . $method . '/v' . $version . '/';
        $query = '?key=' . $GLOBALS['api_key'] . self::parseParameters($parameters);

        $client = new Client(PROTOCOL . '://' . WEB_API_HOSTNAME);
        $request = $client->get($path . $query);
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