<?php

class IEconDOTA2_205790 extends Web_API_Interface
{

    public function GetTicketSaleStatus()
    {
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json->result;
    }

    /**
     * @param $language string The language to provide hero names in.
     * @param $itemizedonly bool Return a list of itemized heroes only.
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetHeroes($language='en_US', $itemizedonly=FALSE)
    {
        $params = array(
            'language' => $language,
            'itemizedonly' => $itemizedonly
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json->result;
    }

    /**
     * @param $language string The language to provide rarity names in.
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetRarities($language)
    {
        $params = array(
            'language' => $language
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json->result;
    }

}
