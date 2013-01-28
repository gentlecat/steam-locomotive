<?php

class DotaTools
{

    function getHeroIcon($hero_name)
    {
        return 'http://media.steampowered.com/apps/dota2/images/heroes/' . $hero_name . '_sb.png';
    }

    function getItemIcon($item_name)
    {
        return 'http://media.steampowered.com/apps/dota2/images/items/' . $item_name . '_lg.png';
    }

}