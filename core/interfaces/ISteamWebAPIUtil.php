<?php

class ISteamWebAPIUtil extends Web_API_Interface
{

    public function GetSupportedAPIList()
    {
        return self::get(__CLASS__, __FUNCTION__, 1);
    }

    public function GetServerInfo()
    {
        return self::get(__CLASS__, __FUNCTION__, 1);
    }

}
