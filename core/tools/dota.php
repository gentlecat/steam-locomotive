<?php
namespace Locomotive\Core\Tools;

use Locomotive\Core\Tool;

class Dota extends Tool
{

    function getHeroPickerData($language = 'english')
    {
        $url = "http://www.dota2.com/jsfeed/abilitydata/?l=" . $language;
        return json_decode(parent::getContent($url));
    }

    function getHeroIconURL($hero_name)
    {
        return 'http://media.steampowered.com/apps/dota2/images/heroes/' . $hero_name . '_sb.png';
    }

    function getItemData($language = 'english')
    {
        $url = "http://www.dota2.com/jsfeed/itemdata/?l=" . $language;
        return json_decode(parent::getContent($url));
    }

    function getItemIconURL($item_name)
    {
        return 'http://media.steampowered.com/apps/dota2/images/items/' . $item_name . '_lg.png';
    }

    function getAbilityData($language = 'english')
    {
        $url = "http://www.dota2.com/jsfeed/abilitydata/?l=" . $language;
        return json_decode(parent::getContent($url));
    }

    function getUniqueUsers()
    {
        return json_decode(parent::getContent("http://www.dota2.com/jsfeed/uniqueusers"));
    }

    function getIntlPrizePool()
    {
        return json_decode(parent::getContent("http://www.dota2.com/jsfeed/intlprizepool"));
    }

}