<?php

class WebAPI {

    /**
     * @param $steamids Array of Community IDs
     * @return array Profiles
     * @throws SteamAPIUnavailableException
     */
    public function GetPlayerSummaries($steamids) {
        if (! is_array($steamids)) {
            $steamids = array($steamids);
        }
        $url = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key='.STEAM_API_KEY.'&steamids=';
        $result = array();
        foreach (array_chunk($steamids, 100) as $chunk) {
            $string = implode(",", $chunk);
            $contents = @file_get_contents($url.$string);
            if ($contents === FALSE) throw new SteamAPIUnavailableException();
            $json = json_decode($contents);
            $result = array_merge($result, $json->response->players);
        }
        return $result;
    }

    public function GetFriendList($steamid) {
        $url = 'http://api.steampowered.com/ISteamUser/GetFriendList/v0001/?key='.STEAM_API_KEY.'&steamid='.$steamid;
        $contents = @file_get_contents($url);
        if ($contents === FALSE) {
            switch ($http_response_header[0]) {
                case "HTTP/1.1 401 Unauthorized":
                    throw new PrivateProfileException();
                    break;
                default:
                    throw new SteamAPIUnavailableException($contents);
            }
        }
        $json = json_decode($contents);
        return $json->friendslist->friends;
    }

}