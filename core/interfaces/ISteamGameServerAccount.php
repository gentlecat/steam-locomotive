<?php
namespace Locomotive\Core\Interfaces;

use Locomotive\Core\WebInterface;

class ISteamGameServerAccount extends WebInterface
{

    /**
     * @param $steamID uint64 SteamID of the game server whose info is being requested
     * @return mixed
     */
    public function GetAccountPublicInfoBySteamID($steamID)
    {
        $params = array(
            'steamID' => $steamID
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

}
