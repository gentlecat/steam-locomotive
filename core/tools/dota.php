<?php
namespace Locomotive\Tools;

class Dota extends Tool
{


    function getHeroPickerData()
    {
        return json_decode(parent::getContent("http://www.dota2.com/jsfeed/heropickerdata"));
    }

    function getHeroIconURL($hero_name)
    {
        return 'http://media.steampowered.com/apps/dota2/images/heroes/' . $hero_name . '_sb.png';
    }

    function getItemData()
    {
        return json_decode(parent::getContent("http://www.dota2.com/jsfeed/itemdata"));
    }

    function getItemIconURL($item_name)
    {
        return 'http://media.steampowered.com/apps/dota2/images/items/' . $item_name . '_lg.png';
    }

    function getAbilityData()
    {
        return json_decode(parent::getContent("http://www.dota2.com/jsfeed/abilitydata"));
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