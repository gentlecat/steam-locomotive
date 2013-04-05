<?php
namespace Locomotive\WebInterfaces;

class ISteamWebAPIUtil extends WebInterface
{

    public function GetSupportedAPIList()
    {
        return self::get(getClassName($this), __FUNCTION__, 1);
    }

    public function GetServerInfo()
    {
        return self::get(getClassName($this), __FUNCTION__, 1);
    }

}
