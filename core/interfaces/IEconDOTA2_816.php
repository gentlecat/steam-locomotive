<?php

class IEconDOTA2_816 extends Web_API_Interface
{

    public function GetTicketSaleStatus()
    {
        return self::get(__CLASS__, __FUNCTION__, 1);
    }

    /**
     * @param $language string The language to provide hero names in.
     * @param $itemizedonly bool Return a list of itemized heroes only.
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetHeroes($language = NULL, $itemizedonly = NULL)
    {
        $params = array(
            'language' => $language,
            'itemizedonly' => $itemizedonly
        );
        return self::get(__CLASS__, __FUNCTION__, 1, $params);
    }

    /**
     * @param $language string The language to provide rarity names in.
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetRarities($language = NULL)
    {
        $params = array(
            'language' => $language
        );
        return self::get(__CLASS__, __FUNCTION__, 1, $params);
    }

}
