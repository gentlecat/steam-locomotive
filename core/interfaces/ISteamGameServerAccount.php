<?php

class ISteamGameServerAccount extends API_Interface
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
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json;
    }

}
