<?php

/**
 * Community API interface
 * Used to access information unavailable in Steam Web API.
 */
class CommunityAPI
{

    function __construct()
    {
        $this->tools = new Tools();
    }

    public function getAppsForUser($community_id)
    {
        if ($this->tools->users->validateUserId($community_id, TYPE_COMMUNITY_ID) == FALSE)
            throw new WrongIDException();
        $url = 'https://steamcommunity.com/profiles/' . $community_id . '/games?tab=all&xml=1';
        $contents = @file_get_contents($url);
        if ($contents === FALSE) {
            throw new SteamAPIUnavailableException();
        } else {
            try {
                $xml = new SimpleXMLElement($contents);
                if (isset($xml->error)) {
                    // TODO: Make sure right exception is thrown
                    throw new SteamAPIUnavailableException();
                } else {
                    return $xml->games->game;
                }
            } catch (Exception $e) {
                // Catching XML parsing errors
                // TODO: Handle this properly
                throw new SteamAPIUnavailableException();
            }
        }
    }

    public function getGroupInfoById($group_id)
    {
        if ($this->tools->groups->validateGroupId($group_id) == FALSE)
            throw new WrongIDException();
        $url = 'https://steamcommunity.com/gid/' . $group_id . '/memberslistxml/?xml=1';
        return self::getGroupInfo($url);
    }

    public function getGroupInfoByName($group_name)
    {
        $url = 'https://steamcommunity.com/groups/' . $group_name . '/memberslistxml/?xml=1';
        return self::getGroupInfo($url);
    }

    private function getGroupInfo($url)
    {
        $contents = @file_get_contents($url);
        if ($contents === FALSE) {
            throw new SteamAPIUnavailableException();
        } else {
            // TODO: This is probably not implemented correctly (errors might occur if requested ID was wrong and group doesn't exist)
            try {
                $xml = new SimpleXMLElement($contents);
                return $xml;
            } catch (Exception $e) {
                // Catching XML parsing errors
                // TODO: Handle this properly
                throw new SteamAPIUnavailableException();
            }
        }
    }

}