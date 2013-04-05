<?php

class App extends Tool
{

    function getAppLogoURL($app_id)
    {
        return 'http://cdn.steampowered.com/v/gfx/apps/' . $app_id . '/header.jpg';
    }

    function getAppDetails($appids, $cc = 'US', $language = 'english')
    {
        $url = 'http://store.steampowered.com/api/appdetails/?l='
            . $language . '&cc=' . $cc . '&appids=' . implode(",", $appids);
        return json_decode(parent::getContent($url));
    }

    function getFeaturedApps($cc = 'US', $language = 'english')
    {
        $url = 'http://store.steampowered.com/api/featured/?l=' . $language . '&cc=' . $cc;
        return json_decode(parent::getContent($url));
    }

    function getFeaturedCategories($cc = 'US', $language = 'english')
    {
        $url = 'http://store.steampowered.com/api/featuredcategories/?l=' . $language . '&cc=' . $cc;
        return json_decode(parent::getContent($url));
    }


}