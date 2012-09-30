<?php

define('TYPE_STEAM_ID', 'steamid');
define('TYPE_COMMUNITY_ID', 'communityid');
define('TYPE_VANITY', 'vanity');

class UserTools {

    public function getBadges($community_id) {
        if (self::validateUserId($community_id, TYPE_COMMUNITY_ID) !== TRUE) {
            throw new WrongIDException($community_id);
        }
        require_once LIB_PATH . 'libs/simple_html_dom.php';
        $url = 'http://steamcommunity.com/profiles/' . $community_id;
        $html = file_get_html($url);
        $badges_html = '';
        foreach($html->find('img.profile_badge_icon') as $element)
        {
            $badges_html .= $element;
        }
        return $badges_html;
    }

    private function get_community_id($input) {
        switch (self::get_type_of_input($input)) {
            case TYPE_COMMUNITY_ID:
                return $input;
            case TYPE_VANITY:
                return self::resolve_vanity_url($input);
            case TYPE_STEAM_ID:
                return self::convertToCommunityID($input);
            default:
                return FALSE;
        }
    }

    public function getTypeOfId($query) {
        if (self::validateUserId($query, TYPE_COMMUNITY_ID)) return TYPE_COMMUNITY_ID;
        if (self::validateUserId($query, TYPE_STEAM_ID)) return TYPE_STEAM_ID;
        return TYPE_VANITY;
        // TODO: Check if vanity URL input is valid
    }

    public function validateUserId($id, $expected_type) {
        switch($expected_type) {
            case TYPE_STEAM_ID:
                if (preg_match("/((?i:STEAM)_)?0:[0-9]:[0-9]*/", $id))
                    return TRUE;
                break;
            case TYPE_COMMUNITY_ID:
                if (ctype_digit($id) && (strlen($id)==17))
                    return TRUE;
                break;
            default:
                return NULL;
        }
        return FALSE;
    }

    public function convertToSteamID($community_id) {
        if (self::validateUserId($community_id, TYPE_COMMUNITY_ID) !== TRUE) {
            throw new WrongIDException($community_id);
        }
        // TODO: Use BCMath maybe
        $temp = intval($community_id) - 76561197960265728;
        $odd_id = $temp % 2;
        $temp = floor($temp / 2);
        return "STEAM_0:".$odd_id.":".$temp;
    }

    public function convertToCommunityID($steam_id) {
        // Example input: STEAM_0:0:17336203 or 0:0:17336203
        // TODO: Use BCMath maybe
        $x = NULL;
        if (preg_match("/(?i:STEAM)_0:[0-9]:[0-9]*/", $steam_id)) {
            $x = substr($steam_id, 8, 1);
        } elseif (preg_match("/0:[0-9]:[0-9]*/", $steam_id)) {
            $x = substr($steam_id, 2, 1);
        } else {
            throw new WrongIDException($steam_id);
        }
        $y = substr($steam_id, 4);
        return ($y * 2) + $x + 76561197960265728;
    }

}
