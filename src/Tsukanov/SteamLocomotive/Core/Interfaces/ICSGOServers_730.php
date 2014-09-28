<?php
namespace Tsukanov\SteamLocomotive\Core\Interfaces;

use Tsukanov\SteamLocomotive\Core\WebInterface;

class ICSGOServers_730 extends WebInterface
{

    public function GetGameServersStatus()
    {
        return self::get(self::getClassName($this), __FUNCTION__, 1);
    }

}
