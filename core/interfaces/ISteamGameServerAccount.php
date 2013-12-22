<?php
namespace Locomotive\WebInterfaces;

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
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

}
