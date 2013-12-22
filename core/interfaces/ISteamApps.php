<?php
namespace Locomotive\WebInterfaces;

class ISteamApps extends WebInterface
{

    public function GetAppList()
    {
        return self::get(getClassName($this), __FUNCTION__, 2);
    }

    /**
     * @param $addr string IP or IP:queryport to list
     * @return mixed
     */
    public function GetServersAtAddress($addr)
    {
        $params = array(
            'addr' => $addr
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

    /**
     * @param $appid uint32 AppID of game
     * @param $version uint32 The installed version of the game
     * @return mixed
     */
    public function UpToDateCheck($appid, $version)
    {
        $params = array(
            'appid' => $appid,
            'version' => $version
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

}
