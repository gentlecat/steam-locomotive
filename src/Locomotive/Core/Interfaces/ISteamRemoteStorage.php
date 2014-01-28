<?php
namespace Locomotive\Core\Interfaces;

use Locomotive\Core\WebInterface;

class ISteamRemoteStorage extends WebInterface
{

    /**
     * @param $ugcid uint64 ID of UGC file to get info for
     * @param $appid uint32 appID of product
     * @param $steamid uint64 If specified, only returns details if the file is owned by the SteamID specified
     * @return mixed
     */
    public function GetUGCFileDetails($ugcid, $appid, $steamid = NULL)
    {
        $params = array(
            'steamid' => $steamid,
            'ugcid' => $ugcid,
            'appid' => $appid
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    /**
     * @param $collectioncount uint32 Number of collection being requested
     * @param $publishedfileids uint64 collection ids to get the details for
     * @return mixed
     */
    public function GetCollectionDetails($collectioncount, $publishedfileids)
    {
        $params = array(
            'collectioncount' => $collectioncount,
            'publishedfileids' => $publishedfileids
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    /**
     * @param $itemcount uint32 Number of items being requested
     * @param $publishedfileids uint64 published file id to look up
     * @return mixed
     */
    public function GetPublishedFileDetails($itemcount, $publishedfileids)
    {
        $params = array(
            'itemcount' => $itemcount,
            'publishedfileids' => $publishedfileids
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }
}
