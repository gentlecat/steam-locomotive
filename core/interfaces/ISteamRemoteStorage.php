<?php
namespace Locomotive\WebInterfaces;

class ISteamRemoteStorage extends WebInterface
{

    /**
     * @param $ugcid uint64 ID of UGC file to get info for
     * @param $appid uint32 appID of product
     * @param $steamID uint64 If specified, only returns details if the file is owned by the SteamID specified
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetUGCFileDetails($ugcid, $appid, $steamID = NULL)
    {
        $params = array(
            'steamID' => $steamID,
            'ugcid' => $ugcid,
            'appid' => $appid
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

    /**
     * @param $collectioncount uint32 Number of collection being requested
     * @param $publishedfileids uint64 collection ids to get the details for
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetCollectionDetails($collectioncount, $publishedfileids)
    {
        $params = array(
            'collectioncount' => $collectioncount,
            'publishedfileids' => $publishedfileids
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

    /**
     * @param $itemcount uint32 Number of items being requested
     * @param $publishedfileids uint64 published file id to look up
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetPublishedFileDetails($itemcount, $publishedfileids)
    {
        $params = array(
            'itemcount' => $itemcount,
            'publishedfileids' => $publishedfileids
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }
}
