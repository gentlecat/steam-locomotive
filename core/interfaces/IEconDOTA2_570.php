<?php
namespace Locomotive\WebInterfaces;

class IEconDOTA2_570 extends WebInterface
{

    public function GetTicketSaleStatus()
    {
        return self::get(getClassName($this), __FUNCTION__, 1);
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
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
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
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

}
