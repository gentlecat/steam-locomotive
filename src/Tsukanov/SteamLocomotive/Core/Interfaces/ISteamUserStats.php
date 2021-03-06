<?php
namespace Tsukanov\SteamLocomotive\Core\Interfaces;

use Tsukanov\SteamLocomotive\Core\WebInterface;

class ISteamUserStats extends WebInterface
{
    /**
     * @param unit64 $gameid GameID to retrieve the achievement percentages for
     */
    public function GetGlobalAchievementPercentagesForApp($gameid)
    {
        $params = array(
            'gameid' => $gameid
        );
        return self::get(self::getClassName($this), __FUNCTION__, 2, $params);
    }

    /**
     * @param unit32 $appid AppID that we're getting user count for
     */
    public function GetNumberOfCurrentPlayers($appid)
    {
        $params = array(
            'appid' => $appid
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    /**
     * @param unit32 $appid AppID that we're getting global stats for
     * @param unit32 $count Number of stats get data for
     * @param string $name Names of stat to get data for
     * @param unit32 $startdate Start date for daily totals (unix epoch timestamp)
     * @param unit32 $enddate End date for daily totals (unix epoch timestamp)
     */
    public function GetGlobalStatsForGame($appid, $count, $name, $startdate = NULL, $enddate = NULL)
    {
        $params = array(
            'appid' => $appid,
            'count' => $count,
            'name' => $name,
            'startdate' => $startdate,
            'enddate' => $enddate
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    /**
     * @param unit32 $appid appid of game
     * @param string $l localized language to return (english, french, etc.)
     */
    public function GetSchemaForGame($appid, $l = NULL)
    {
        $params = array(
            'appid' => $appid,
            'l' => $l
        );
        return self::get(self::getClassName($this), __FUNCTION__, 2, $params);
    }

    /**
     * @param unit32 $appid appid of game
     * @param unit64 $steamid SteamID of user
     */
    public function GetUserStatsForGame($appid, $steamid)
    {
        $params = array(
            'appid' => $appid,
            'steamid' => $steamid
        );
        return self::get(self::getClassName($this), __FUNCTION__, 2, $params);
    }

    /**
     * @param unit32 $steamid SteamID of user
     * @param unit32 $appid AppID to get achievements for
     * @param string $language Language to return strings for
     */
    public function GetPlayerAchievements($steamid, $appid, $l = NULL)
    {
        $params = array(
            'steamid' => $steamid,
            'appid' => $appid,
            'l' => $l
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }


}
