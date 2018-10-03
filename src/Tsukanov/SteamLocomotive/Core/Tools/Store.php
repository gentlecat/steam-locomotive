<?php
namespace Tsukanov\SteamLocomotive\Core\Tools;

use Tsukanov\SteamLocomotive\Core\Tool;

class Store extends Tool
{

    function getAppLogoURL($appId, $size = 'large')
    {
        switch ($size) {
            case 'large':
                return 'http://cdn.akamai.steamstatic.com/steam/apps/' . $appId . '/header.jpg'; // 460x215
            case 'medium':
                return 'http://cdn.akamai.steamstatic.com/steam/apps/' . $appId . '/header_292x136.jpg';
            case 'small':
                return 'http://cdn.akamai.steamstatic.com/steam/apps/' . $appId . '/capsule_184x69.jpg';
        }
    }

    /**
     * Returns URL of store page background image.
     * @param $app_id
     * @return string
     */
    function getAppPageBgURL($app_id)
    {
        return 'http://cdn.akamai.steamstatic.com/steam/apps/' . $app_id . '/page.bg.jpg';
    }

    function getAppPageBgGenURL($app_id)
    {
        return 'http://cdn.akamai.steamstatic.com/steam/apps/' . $app_id . '/page_bg_generated.jpg';
    }

    function getAppDetails($appIds = array(), $cc = 'US', $language = 'english')
    {
        $url = 'http://store.steampowered.com/api/appdetails/?';

        $parameters = array(
            'l' => $language,
            'cc' => $cc,
            'appids' => implode(",", $appIds),
            'filters' => 'price_overview'
        );

        $url .= http_build_query($parameters);

        return json_decode(parent::getContent($url));
    }

    function getAppUserDetails($appIds = array())
    {
        $url = 'http://store.steampowered.com/api/appdetails/?';

        $parameters = array(
            'appids' => implode(",", $appIds),
            'filters' => 'price_overview'
        );

        $url .= http_build_query($parameters);

        return json_decode(parent::getContent($url));
    }

    function getPackageDetails($packageids = array())
    {
        $url = 'http://store.steampowered.com/api/packagedetails/?packageids=' . implode(",", $packageids);
        return json_decode(parent::getContent($url));
    }

    function getFeatured($cc = 'US', $language = 'english')
    {
        $url = 'http://store.steampowered.com/api/featured/?l=' . $language . '&cc=' . $cc;
        return json_decode(parent::getContent($url));
    }

    function getFeaturedCategories($cc = 'US', $language = 'english')
    {
        $url = 'http://store.steampowered.com/api/featuredcategories/?l=' . $language . '&cc=' . $cc;
        return json_decode(parent::getContent($url));
    }

    function getSalePage($id)
    {
        $url = 'http://store.steampowered.com/api/salepage/?id=' . $id;
        return json_decode(parent::getContent($url));
    }
}
