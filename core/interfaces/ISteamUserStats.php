<?php

class ISteamUserStats extends Web_API_Interface
{
    /**
     * @param unit64 $gameid GameID to retrieve the achievement percentages for
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetGlobalAchievementPercentagesForApp($gameid)
    {
        $params = array(
            'gameid' => $gameid
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 2, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
    }

    /**
     * @param unit32 $appid AppID that we're getting user count for
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetNumberOfCurrentPlayers($appid)
    {
        $params = array(
            'appid' => $appid
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 2, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
    }

    /**
     * @param unit32 $appid AppID that we're getting global stats for
     * @param unit32 $count Number of stats get data for
     * @param string $name Names of stat to get data for
     * @param unit32 $startdate Start date for daily totals (unix epoch timestamp)
     * @param unit32 $enddate End date for daily totals (unix epoch timestamp)
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetGlobalStatsForGame($appid,$count,$name,$startdate=NULL,$enddate=NULL)
    {
        $params = array(
            'appid' => $appid,
            'count' => $count,
            'name' => $name,
            'startdate' => $startdate,
            'enddate' => $enddate
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
    }

    /**
     * @param unit32 $appid appid of game
     * @param string $l localized language to return (english, french, etc.)
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetSchemaForGame($appid, $l)
    {
        $params = array(
            'appid' => $appid,
            'l' => $l
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 2, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
    }

    /**
     * @param unit32 $appid appid of game
     * @param unit64 $steamid SteamID of user
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetUserStatsForGame($appid, $steamid)
    {
        $params = array(
            'appid' => $appid,
            'steamid' => $steamid
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 2, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
    }

    /**
     * @param unit32 $steamid SteamID of user
     * @param unit32 $appid AppID to get achievements for
     * @param string $language Language to return strings for
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetPlayerAchievements($steamid,$appid,$language=NULL)
    {
        $params = array(
            'steamid' => $steamid,
            'appid' => $appid,
            'language' => $language
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
    }



}
