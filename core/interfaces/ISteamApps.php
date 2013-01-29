<?php

class ISteamApps extends API_Interface
{

    public function GetAppList()
    {
        $contents = self::getContent(__CLASS__, __FUNCTION__, 2);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json->applist;
    }

    /**
     * @param $addr string IP or IP:queryport to list
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetServersAtAddress($addr)
    {
        $params = array(
            'addr' => $addr
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json;
    }

    /**
     * @param $appid uint32 AppID of game
     * @param $version uint32 The installed version of the game
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function UpToDateCheck($appid, $version)
    {
        $params = array(
            'appid' => $appid,
            'version' => $version
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json;
    }

}
