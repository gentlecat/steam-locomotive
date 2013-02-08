<?php

define('LOCOMOTIVE_TOOLS_PATH', LOCOMOTIVE_CORE_PATH . 'tools/');

/**
 * Tools to work with Steam APIs
 */
class Tools
{

    public function __construct()
    {
        require_once LOCOMOTIVE_TOOLS_PATH . 'usertools.php';
        $this->users = new UserTools();

        require_once LOCOMOTIVE_TOOLS_PATH . 'grouptools.php';
        $this->groups = new GroupTools();

        require_once LOCOMOTIVE_TOOLS_PATH . 'apptools.php';
        $this->apps = new AppTools();

        require_once LOCOMOTIVE_TOOLS_PATH . 'dotatools.php';
        $this->dota = new DotaTools();
    }

}

class Tool {

    public function getContent($url)
    {
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