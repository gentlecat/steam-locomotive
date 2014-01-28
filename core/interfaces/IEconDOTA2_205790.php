<?php
namespace Locomotive\Core\Interfaces;

use Locomotive\Core\WebInterface;

class IEconDOTA2_205790 extends WebInterface
{

    public function GetTicketSaleStatus()
    {
        return self::get(self::getClassName($this), __FUNCTION__, 1);
    }

    /**
     * @param $language string The language to provide hero names in.
     * @param $itemizedonly bool Return a list of itemized heroes only.
     * @return mixed
     */
    public function GetHeroes($language = NULL, $itemizedonly = NULL)
    {
        $params = array(
            'language' => $language,
            'itemizedonly' => $itemizedonly
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    /**
     * @param $language string The language to provide rarity names in.
     * @return mixed
     */
    public function GetRarities($language = NULL)
    {
        $params = array(
            'language' => $language
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetTournamentPrizePool($leagueid = NULL, $language = NULL)
    {
        $params = array(
            'leagueid' => $leagueid,
            'language' => $language
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

}
