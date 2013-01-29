<?php

class GroupTools
{

    /**
     * @param $id Group ID
     * @return bool|string Returns type of ID if detected or FALSE if not
     */
    public function getTypeOfId($id)
    {
        if (self::validateGroupId($id, TYPE_COMMUNITY_ID)) return TYPE_COMMUNITY_ID;
        if (self::validateGroupId($id, TYPE_VANITY)) return TYPE_VANITY;
        return FALSE;
    }

    /**
     * @param $id Group ID
     * @param string $expected_type Expected type of Group ID
     * @return bool TRUE if valid, FALSE if not
     */
    public function validateGroupId($id, $expected_type = TYPE_COMMUNITY_ID)
    {
        switch ($expected_type) {
            case TYPE_COMMUNITY_ID:
                if (ctype_digit($id) && (strlen($id) == 18)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            case TYPE_VANITY:
                // TODO: Validate
                return TRUE;
            default:
                return FALSE;
        }
    }

}