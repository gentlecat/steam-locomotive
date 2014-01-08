<?php
namespace Locomotive\WebInterfaces;

class ISteamUser extends WebInterface
{

    /**
     * @param $steamID uint64 SteamID of user
     * @param string $relationship relationship type (ex: friend)
     * @return mixed
     */
    public function GetFriendList($steamID, $relationship = NULL)
    {
        $params = array(
            'steamID' => $steamID,
            'relationship' => $relationship
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

    /**
     * @param $steamids  Array of steamIDs
     * @return mixed
     */
    public function GetPlayerBans($steamids = array())
    {
        $bans = null;
        foreach (array_chunk($steamids, 100) as $iteration => $chunk) {
            $params = array(
                'steamids' => implode(",", $chunk)
            );
            $response = self::get(getClassName($this), __FUNCTION__, 1, $params);
            if ($iteration === 0) {
                $bans = $response;
            } else {
                $bans->players = array_merge(
                    $bans->players,
                    $response->players
                );
            }
        }
        return $bans;
    }

    /**
     * @param $steamid unit64 SteamID of user
     * @return mixed
     */
    public function GetUserGroupList($steamid)
    {
        $params = array(
            'steamid' => $steamid
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

    public function ResolveVanityURL($vanityurl)
    {
        $params = array(
            'vanityurl' => $vanityurl
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

    /**
     * @param $steamids Array of steamIDs
     * @return mixed
     */
    public function GetPlayerSummaries($steamids = array())
    {
        $summaries = null;
        foreach (array_chunk($steamids, 100) as $iteration => $chunk) {
            $params = array(
                'steamids' => implode(",", $chunk)
            );
            $response = self::get(getClassName($this), __FUNCTION__, 2, $params);
            if ($iteration === 0) {
                $summaries = $response;
            } else {
                $summaries->response->players = array_merge(
                    $summaries->response->players,
                    $response->response->players
                );
            }
        }
        return $summaries;
    }

}
