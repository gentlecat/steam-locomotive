<?php

define('USER_ID_TYPE_COMMUNITY', 'communityid');
define('USER_ID_TYPE_STEAM', 'steamid');
define('USER_ID_TYPE_VANITY', 'vanityid');

class UserTools
{

    /**
     * Get HTML code with badges (images)
     * @param int $community_id User's community ID
     * @return null|string Returns HTML with badges on success or NULL if badges weren't found
     * @throws WrongIDException
     */
    public function getBadges($community_id)
    {
        $url = 'http://steamcommunity.com/profiles/' . $community_id;
        $profile_page_html = file_get_html($url);
        $badges_html = '';
        foreach ($profile_page_html->find('img.profile_badge_icon') as $element) {
            $badges_html .= $element;
        }
        if (empty($badges_html)) return NULL;
        return $badges_html;
    }

    /**
     * Converts User ID into Community ID
     * @param mixed $id User ID
     * @return bool|null|string Returns Community ID or FALSE if supplied ID cannot be converted
     */
    public function convertToCommunityId($id)
    {
        switch (self::getTypeOfId($id)) {
            case USER_ID_TYPE_COMMUNITY:
                return $id;
            case USER_ID_TYPE_VANITY:
                $api_interface = new ISteamUser();
                return $api_interface->ResolveVanityURL($id);
            case USER_ID_TYPE_STEAM:
                return self::steamIdToCommunityId($id);
            default:
                return FALSE;
        }
    }

    /**
     * Returns type of supplied ID
     * @param mixed $id User ID
     * @return bool|string Returns type of ID or FALSE if not determined
     */
    public function getTypeOfId($id)
    {
        if (self::validateUserId($id, USER_ID_TYPE_COMMUNITY)) return USER_ID_TYPE_COMMUNITY;
        if (self::validateUserId($id, USER_ID_TYPE_STEAM)) return USER_ID_TYPE_STEAM;
        if (self::validateUserId($id, USER_ID_TYPE_VANITY)) return USER_ID_TYPE_VANITY;
        return FALSE;
    }

    /**
     * @param mixed $id User ID
     * @param string $expected_type Expected type of ID
     * @return bool TRUE if correct, FALSE otherwise
     */
    public function validateUserId($id, $expected_type)
    {
        switch ($expected_type) {
            case USER_ID_TYPE_COMMUNITY:
                if (ctype_digit($id) && (strlen($id) == 17)) return TRUE;
                else return FALSE;
            case USER_ID_TYPE_STEAM:
                if (preg_match('/((?i:STEAM)_)?0:[0-9]:[0-9]*/', $id)) return TRUE;
                else return FALSE;
            case USER_ID_TYPE_VANITY:
                // TODO: Validate
                if (TRUE) return TRUE;
                else return FALSE;
            default:
                return FALSE;
        }
        return FALSE;
    }

    /**
     * Converts Community ID to Steam ID
     * @param int $community_id Community ID
     * @param bool $is_short Is short Steam ID required
     * @return string Steam ID
     * @throws WrongIDException
     */
    public function communityIdToSteamId($community_id, $is_short = FALSE)
    {
        $temp = intval($community_id) - 76561197960265728;
        $odd_id = $temp % 2;
        $temp = floor($temp / 2);
        if ($is_short) {
            return $odd_id . ':' . $temp;
        } else {
            return 'STEAM_0:' . $odd_id . ':' . $temp;
        }
    }

    /**
     * Converts Steam ID to Community ID
     * Example input: STEAM_0:0:17336203 or 0:0:17336203
     * @param string $steam_id Full or short Steam ID
     * @return string Community ID
     * @throws WrongIDException
     */
    public function steamIdToCommunityId($steam_id)
    {
        $x = NULL;
        if (preg_match('/(?i:STEAM)_0:[0-9]:[0-9]*/', $steam_id)) {
            $x = substr($steam_id, 8, 1);
        } elseif (preg_match('/0:[0-9]:[0-9]*/', $steam_id)) {
            $x = substr($steam_id, 2, 1);
        } else {
            throw new WrongIDException($steam_id);
        }
        $y = substr($steam_id, 4);
        return ($y * 2) + $x + 76561197960265728;
    }

}


class WrongIDException extends Exception
{
}