<?php

class ISteamRemoteStorage extends API_Interface
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
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
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
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
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
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        return json_decode($contents);
    }
}
