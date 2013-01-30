<?php

define('WEB_API_HOSTNAME', 'api.steampowered.com');

class API_Interface
{

    public function getContent($interface, $method, $version, $parameters = array())
    {
        $url = PROTOCOL . '://' . WEB_API_HOSTNAME . '/' . $interface . '/' . $method . '/v' . $version
            . '/?key=' . STEAM_API_KEY;
        $param_keys = array_keys($parameters);
        foreach ($param_keys as $key) {
            $val = $parameters[$key];
            if (!is_null($val)) {
                $url = $url . '&' . $key . '=' . $val;
            }
        }
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200) {
            $result = FALSE;
        }
        curl_close($ch);
        return $result;
    }

}
