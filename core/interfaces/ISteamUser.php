<?php

class ISteamUser extends Web_API_Interface
{

    /**
     * @param $steamID uint64 SteamID of user
     * @param string $relationship relationship type (ex: friend)
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetFriendList($steamID, $relationship = NULL)
    {
        $params = array(
            'steamID' => $steamID,
            'relationship' => $relationship
        );
        return self::get(__CLASS__, __FUNCTION__, 1, $params);
    }

    /**
     * @param $steamids  Array of steamIDs
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetPlayerBans($steamids)
    {
        $params = array(
            'steamids' => implode(",", $steamids)
        );
        return self::get(__CLASS__, __FUNCTION__, 1, $params);
    }

    /**
     * @param $steamid unit64 SteamID of user
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetUserGroupList($steamid)
    {
        $params = array(
            'steamid' => $steamid
        );
        return self::get(__CLASS__, __FUNCTION__, 1, $params);
    }

    public function ResolveVanityURL($vanityurl)
    {
        $params = array(
            'vanityurl' => $vanityurl
        );
        return self::get(__CLASS__, __FUNCTION__, 1, $params);
    }

    /**
     * @param $steamids Array of steamIDs
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetPlayerSummaries($steamids)
    {
        $params = array(
            'steamids' => implode(",", $steamids)
        );
        return self::get(__CLASS__, __FUNCTION__, 2, $params);
    }

}
