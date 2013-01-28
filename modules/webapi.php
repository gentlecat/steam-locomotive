<?php

define('DOTA_SKILL_ANY', 0);
define('DOTA_SKILL_NORMAL', 1);
define('DOTA_SKILL_HIGH', 2);
define('DOTA_SKILL_VERY_HIGH', 3);

class WebAPI
{

    function __construct()
    {
        $this->tools = new Tools();
    }

    private function getContent($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200) {
            $result = FALSE;
        }
        curl_close($ch);
        return $result;
    }

    public function GetAppList()
    {
        $url = "http://api.steampowered.com/ISteamApps/GetAppList/v2";
    }

    public function GetAssetClassInfo($appid, $language, $classidN, $class_count)
    {
        $url = "http://api.steampowered.com/ISteamEconomy/GetAssetClassInfo/v0001/";
    }

    public function GetAssetPrices($appid, $language, $currency)
    {

    }

    public function GetGlobalAchievementPercentagesForApp()
    {
        $url = "http://api.steampowered.com/ISteamUserStats/GetGlobalAchievementPercentagesForApp/v0002";
    }

    public function GetNewsForApp($appid, $count, $maxlength)
    {
        $url = "http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002";
    }

    public function GetPlayerAchievements($steamid, $appid, $l = '')
    {
        $url = "http://api.steampowered.com/ISteamUserStats/GetPlayerAchievements/v1";
    }

    public function GetPlayerItems($steamid, $appid)
    {
        $url = "http://api.steampowered.com/IEconItems_$appid/GetPlayerItems/v0001/";
    }

    public function GetPlayerSummaries($steamids)
    {
        foreach ($steamids as $id) {
            if ($this->tools->users->validateUserId($id, TYPE_COMMUNITY_ID) == FALSE)
                throw new WrongIDException();
        }
        $url = 'https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key='
            . STEAM_API_KEY . '&steamids=';
        $result = array();
        foreach (array_chunk($steamids, 100) as $chunk) {
            $string = implode(",", $chunk);
            $contents = self::getContent($url . $string);
            if ($contents === FALSE) throw new SteamAPIUnavailableException();
            $json = json_decode($contents);
            $result = array_merge($result, $json->response->players);
        }
        return $result;
    }

    public function GetPlayerBans($steamids)
    {
        foreach ($steamids as $id) {
            if ($this->tools->users->validateUserId($id, TYPE_COMMUNITY_ID) == FALSE)
                throw new WrongIDException();
        }
        $url = 'https://api.steampowered.com/ISteamUser/GetPlayerBans/v1/?key='
            . STEAM_API_KEY . '&steamids=';
        $result = array();
        foreach (array_chunk($steamids, 100) as $chunk) {
            $string = implode(",", $chunk);
            $contents = self::getContent($url . $string);
            if ($contents === FALSE) throw new SteamAPIUnavailableException();
            $json = json_decode($contents);
            $result = array_merge($result, $json->players);
        }
        return $result;
    }

    public function GetFriendList($steamid)
    {
        if ($this->tools->users->validateUserId($steamid, TYPE_COMMUNITY_ID) == FALSE)
            throw new WrongIDException();
        $url = 'https://api.steampowered.com/ISteamUser/GetFriendList/v0001/?key='
            . STEAM_API_KEY . '&steamid=' . $steamid;
        $contents = self::getContent($url);
        if ($contents === FALSE) {
            switch ($http_response_header[0]) {
                case "HTTP/1.1 401 Unauthorized":
                    throw new UnauthorizedException();
                    break;
                default:
                    throw new SteamAPIUnavailableException($contents);
            }
        }
        $json = json_decode($contents);
        return $json->friendslist->friends;
    }

    public function GetMatchHistory($matches_requested = NULL,
                                    $start_at_match_id = NULL,
                                    $account_id = NULL,
                                    $date_max = NULL,
                                    $date_min = NULL,
                                    $skill = NULL,
                                    $hero_id = NULL,
                                    $league_id = NULL,
                                    $player_name = NULL)
    {
        $url = 'https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/V001/?key=' . STEAM_API_KEY;
        if (!empty($matches_requested)) $url = $url . '&matches_requested=' . $matches_requested;
        if (!empty($start_at_match_id)) $url = $url . '&start_at_match_id=' . $start_at_match_id;
        if (!empty($account_id)) $url = $url . '&account_id=' . $account_id;
        if (!empty($date_max)) $url = $url . '&date_max=' . $date_max;
        if (!empty($date_min)) $url = $url . '&date_min=' . $date_min;
        if (!empty($skill)) $url = $url . '&skill=' . $skill;
        if (!empty($hero_id)) $url = $url . '&hero_id=' . $hero_id;
        if (!empty($league_id)) $url = $url . '&league_id=' . $league_id;
        if (!empty($player_name)) $url = $url . '&player_name=' . $player_name;

        $contents = self::getContent($url);
        if ($contents === FALSE) {
            switch ($http_response_header[0]) {
                case "HTTP/1.1 401 Unauthorized":
                    throw new UnauthorizedException();
                    break;
                default:
                    throw new SteamAPIUnavailableException($contents);
            }
        }
        $json = json_decode($contents);
        return $json;
    }

    public function GetMatchDetails($match_id)
    {
        $contents = self::getContent('https://api.steampowered.com/IDOTA2Match_570/GetMatchDetails/V001/?key='
            . STEAM_API_KEY . '&match_id=' . $match_id);
        if ($contents === FALSE) {
            switch ($http_response_header[0]) {
                case "HTTP/1.1 401 Unauthorized":
                    throw new UnauthorizedException();
                    break;
                default:
                    throw new SteamAPIUnavailableException($contents);
            }
        }
        $json = json_decode($contents);
        return $json->result;
    }

    public function GetHeroes()
    {
        $contents = self::getContent('https://api.steampowered.com/IEconDOTA2_570/GetHeroes/v0001/?key=' . STEAM_API_KEY);
        if ($contents === FALSE) {
            switch ($http_response_header[0]) {
                case "HTTP/1.1 401 Unauthorized":
                    throw new UnauthorizedException();
                    break;
                default:
                    throw new SteamAPIUnavailableException($contents);
            }
        }
        $json = json_decode($contents);
        return $json->result->heroes;
    }

    public
    function ResolveVanityURL($vanityurl)
    {
        $contents = self::getContent('https://api.steampowered.com/ISteamUser/ResolveVanityURL/v0001/?key='
            . STEAM_API_KEY . '&vanityurl=' . $vanityurl);
        if ($contents === FALSE) return FALSE;
        $json = json_decode($contents);
        if ($json->response->success == '1') return $json->response->steamid;
        return NULL; // Profile not found
    }

}