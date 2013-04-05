<?php

class Dota extends Tool
{

    function getHeroIconURL($hero_name)
    {
        return 'http://media.steampowered.com/apps/dota2/images/heroes/' . $hero_name . '_sb.png';
    }

    function getItemIconURL($item_name)
    {
        return 'http://media.steampowered.com/apps/dota2/images/items/' . $item_name . '_lg.png';
    }

}