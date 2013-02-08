<?php

define('GROUP_ID_TYPE_STEAM', 'steamid');
define('GROUP_ID_TYPE_VANITY', 'vanityid');

class GroupTools
{

    /**
     * @param $id Group ID
     * @return bool|string Returns type of ID if detected or FALSE if not
     */
    public function getTypeOfId($id)
    {
        if (self::validateGroupId($id, GROUP_ID_TYPE_STEAM)) return GROUP_ID_TYPE_STEAM;
        if (self::validateGroupId($id, GROUP_ID_TYPE_VANITY)) return GROUP_ID_TYPE_VANITY;
        return FALSE;
    }

    /**
     * @param $id Group ID
     * @param string $expected_type Expected type of Group ID
     * @return bool TRUE if valid, FALSE if not
     */
    public function validateGroupId($id, $expected_type)
    {
        switch ($expected_type) {
            case GROUP_ID_TYPE_STEAM:
                if (ctype_digit($id) && (strlen($id) == 18)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            case GROUP_ID_TYPE_VANITY:
                // TODO: Validate
                return TRUE;
            default:
                return FALSE;
        }
    }

}