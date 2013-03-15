<?php

/**
 * Community API interface
 * Used to access information unavailable in Steam Web API.
 */
class CommunityAPI
{

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

    public function getGroupInfoById($group_id)
    {
        $url = 'http://steamcommunity.com/gid/' . $group_id . '/memberslistxml/';
        return self::getGroupInfo($url);
    }

    public function getGroupInfoByName($group_name)
    {
        $url = 'http://steamcommunity.com/groups/' . $group_name . '/memberslistxml/';
        return self::getGroupInfo($url);
    }

    private function getGroupInfo($url)
    {
        $contents = self::getContent($url);
        if ($contents === FALSE) {
            throw new SteamAPIUnavailableException();
        } else {
            // TODO: This is probably not implemented correctly (errors might occur if requested ID was wrong and group doesn't exist)
            $xml = new SimpleXMLElement($contents);
            return $xml;
        }
    }

}