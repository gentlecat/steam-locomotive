<?php

class ISteamUser extends Web_API_Interface
{

    /**
     * @param $steamID uint64 SteamID of user
     * @param string $relationship relationship type (ex: friend)
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetFriendList($steamID, $relationship = 'friend')
    {
        $params = array(
            'steamID' => $steamID,
            'relationship' => $relationship
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
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
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
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
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
    }

    public function ResolveVanityURL($vanityurl)
    {
        $params = array(
            'vanityurl' => $vanityurl
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
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
        $contents = self::getContent(__CLASS__, __FUNCTION__, 2, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
    }

}
