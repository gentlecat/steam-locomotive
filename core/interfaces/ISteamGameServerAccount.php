<?php

class ISteamGameServerAccount extends Web_API_Interface
{

    /**
     * @param $steamID uint64 SteamID of the game server whose info is being requested
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetAccountPublicInfoBySteamID($steamID)
    {
        $params = array(
            'steamID' => $steamID
        );
        return self::get(__CLASS__, __FUNCTION__, 1, $params);
    }

}
