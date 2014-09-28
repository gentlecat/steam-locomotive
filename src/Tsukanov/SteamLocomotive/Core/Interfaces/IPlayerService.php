<?php
namespace Tsukanov\SteamLocomotive\Core\Interfaces;

use Tsukanov\SteamLocomotive\Core\WebInterface;

class IPlayerService extends WebInterface
{

    /**
     * @param uint64 $steamid The player we're asking about
     * @param uint32 $count The number of games to return (0/unset: all)
     */
    public function GetRecentlyPlayedGames($steamid = NULL, $count = NULL)
    {
        $params = array(
            'steamid' => $steamid,
            'count' => $count
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    /**
     * @param uint64 $steamid The player we're asking about
     * @param bool $include_appinfo true if we want additional details (name, icon) about each game
     * @param bool $include_played_free_games Free games are excluded by default.  If this is set, free games the user has played will be returned.
     * @param uint32 $appids_filter if set, restricts result set to the passed in apps
     */
    public function GetOwnedGames($steamid = NULL,
                                  $include_appinfo = NULL,
                                  $include_played_free_games = NULL,
                                  $appids_filter = NULL)
    {
        $params = array(
            'steamid' => $steamid,
            'include_appinfo' => $include_appinfo,
            'include_played_free_games' => $include_played_free_games,
            'appids_filter' => $appids_filter
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetSteamLevel($steamid)
    {
        $params = array(
            'steamid' => $steamid
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetBadges($steamid)
    {
        $params = array(
            'steamid' => $steamid
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetCommunityBadgeProgress($steamid, $badgeid)
    {
        $params = array(
            'steamid' => $steamid,
            'badgeid' => $badgeid
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    public function IsPlayingSharedGame($steamid, $appid_playing)
    {
        $params = array(
            'steamid' => $steamid,
            'appid_playing' => $appid_playing
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

}
