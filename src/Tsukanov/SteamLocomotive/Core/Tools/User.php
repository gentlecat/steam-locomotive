<?php
namespace Tsukanov\SteamLocomotive\Core\Tools;

use Tsukanov\SteamLocomotive\Core\Interfaces\ISteamUser;
use Tsukanov\SteamLocomotive\Core\Tool;

define('USER_ID_TYPE_COMMUNITY', 'communityid');
define('USER_ID_TYPE_STEAM', 'steamid');
define('USER_ID_TYPE_VANITY', 'vanityid');

class User extends Tool
{

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
                if ((ctype_digit($id) && (strlen($id) == 17)) || (is_numeric($id) && $id > 76561197960265728 )) return TRUE;
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
        $y = NULL;
        if (preg_match('/(?i:STEAM)_0:[0-9]:[0-9]*/', $steam_id)) {
            $x = substr($steam_id, 8, 1);
            $y = substr($steam_id, 10);
        } elseif (preg_match('/0:[0-9]:[0-9]*/', $steam_id)) {
            $x = substr($steam_id, 2, 1);
            $y = substr($steam_id, 4);
        } else {
            throw new WrongIDException($steam_id);
        }
        return ($y * 2) + $x + 76561197960265728;
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

}

class WrongIDException extends \Exception
{
}