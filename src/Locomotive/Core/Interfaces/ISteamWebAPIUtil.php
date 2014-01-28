<?php
namespace Locomotive\Core\Interfaces;

use Locomotive\Core\WebInterface;

class ISteamWebAPIUtil extends WebInterface
{

    public function GetSupportedAPIList()
    {
        return self::get(self::getClassName($this), __FUNCTION__, 1);
    }

    public function GetServerInfo()
    {
        return self::get(self::getClassName($this), __FUNCTION__, 1);
    }

}
