<?php

define('WEB_API_HOSTNAME', 'api.steampowered.com');
define('PROTOCOL', 'https');

class Web_API_Interface
{

    public function get($interface, $method, $version, $parameters = array())
    {
        $url = PROTOCOL . '://' . WEB_API_HOSTNAME . '/' . $interface . '/' . $method . '/v' . $version
            . '/?key=' . $GLOBALS['api_key'] . self::parseParameters($parameters);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200) {
            $result = FALSE;
        }
        if (strpos(curl_getinfo($ch, CURLINFO_CONTENT_TYPE), 'json') !== false) {
            $result = json_decode($result);
        }
        curl_close($ch);
        return $result;
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

}
