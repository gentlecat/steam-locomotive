<?php

class WebAPI
{

    function __construct()
    {
        $this->tools = new Tools();
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
            $contents = @file_get_contents($url . $string);
            if ($contents === FALSE) throw new SteamAPIUnavailableException();
            $json = json_decode($contents);
            $result = array_merge($result, $json->response->players);
        }
        return $result;
    }

    public function GetPlayerBans($steamids) {
        foreach ($steamids as $id) {
            if ($this->tools->users->validateUserId($id, TYPE_COMMUNITY_ID) == FALSE)
                throw new WrongIDException();
        }
        $url = 'https://api.steampowered.com/ISteamUser/GetPlayerBans/v1/?key='
            . STEAM_API_KEY . '&steamids=';
        $result = array();
        foreach (array_chunk($steamids, 100) as $chunk) {
            $string = implode(",", $chunk);
            $contents = @file_get_contents($url . $string);
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

    public function ResolveVanityURL($vanityurl)
    {
        $url = 'https://api.steampowered.com/ISteamUser/ResolveVanityURL/v0001/?key='
            . STEAM_API_KEY . '&vanityurl=' . $vanityurl;
        $contents = @file_get_contents($url);
        if ($contents === FALSE) return FALSE;
        $json = json_decode($contents);
        if ($json->response->success == '1') return $json->response->steamid;
        return NULL; // Profile not found
    }

}