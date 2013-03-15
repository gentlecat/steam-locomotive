<?php

class ISteamWebWebAPIUtil extends Web_API_Interface
{

    public function GetSupportedAPIList()
    {
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json;
    }

    public function GetServerInfo()
    {
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json;
    }

}
