<?php

class UserTools
{

    /**
     * Get HTML code with badges (images)
     * @param $community_id User's community ID
     * @return null|string Returns HTML with badges on success or NULL if badges weren't found
     * @throws WrongIDException
     */
    public function getBadges($community_id)
    {
        if (self::validateUserId($community_id, TYPE_COMMUNITY_ID) !== TRUE) {
            throw new WrongIDException($community_id);
        }
        require_once LOCOMOTIVE_PATH . 'libs/simple_html_dom.php';
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
     * @param $id User ID
     * @return bool|null|string Returns Community ID or FALSE if supplied ID cannot be converted
     */
    public function convertToCommunityId($id)
    {
        switch (self::getTypeOfId($id)) {
            case TYPE_COMMUNITY_ID:
                return $id;
            case TYPE_VANITY:
                $webapi = new WebAPI();
                return $webapi->ResolveVanityURL($id);
            case TYPE_STEAM_ID:
                return self::steamIdToCommunityId($id);
            default:
                return FALSE;
        }
    }

    /**
     * Returns type of supplied ID
     * @param $id User ID
     * @return bool|string Returns type of ID or FALSE if not determined
     */
    public function getTypeOfId($id)
    {
        if (self::validateUserId($id, TYPE_COMMUNITY_ID)) return TYPE_COMMUNITY_ID;
        if (self::validateUserId($id, TYPE_STEAM_ID)) return TYPE_STEAM_ID;
        if (self::validateUserId($id, TYPE_VANITY)) return TYPE_VANITY;
        return FALSE;
    }

    /**
     * @param $id User ID
     * @param $expected_type Expected type of ID
     * @return bool TRUE if correct, FALSE otherwise
     */
    public function validateUserId($id, $expected_type)
    {
        switch ($expected_type) {
            case TYPE_COMMUNITY_ID:
                if (ctype_digit($id) && (strlen($id) == 17)) return TRUE;
                else return FALSE;
            case TYPE_STEAM_ID:
                if (preg_match('/((?i:STEAM)_)?0:[0-9]:[0-9]*/', $id)) return TRUE;
                else return FALSE;
            case TYPE_VANITY:
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
     * @param $community_id Community ID
     * @param bool $is_short Is short Steam ID required
     * @return string Steam ID
     * @throws WrongIDException
     */
    public function communityIdToSteamId($community_id, $is_short = FALSE)
    {
        if (self::validateUserId($community_id, TYPE_COMMUNITY_ID) !== TRUE) {
            throw new WrongIDException($community_id);
        }
        // TODO: Use BCMath maybe
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
     * @param $steam_id Full or short Steam ID
     * @return string Community ID
     * @throws WrongIDException
     */
    public function steamIdToCommunityId($steam_id)
    {
        // Example input: STEAM_0:0:17336203 or 0:0:17336203
        // TODO: Use BCMath maybe
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
