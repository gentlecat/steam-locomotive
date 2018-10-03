<?php
namespace Tsukanov\SteamLocomotive\Core\Tools;

use Tsukanov\SteamLocomotive\Core\Tool;

class Store extends Tool
{

    function getAppLogoURL($app_id, $size = 'large')
    {
        switch ($size) {
            case 'large':
                return 'http://cdn.akamai.steamstatic.com/steam/apps/' . $app_id . '/header.jpg'; // 460x215
            case 'medium':
                return 'http://cdn.akamai.steamstatic.com/steam/apps/' . $app_id . '/header_292x136.jpg';
            case 'small':
                return 'http://cdn.akamai.steamstatic.com/steam/apps/' . $app_id . '/capsule_184x69.jpg';
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

    /**
     * @param int $appId
     * @param string $cc
     * @param string $language
     * @return null|\stdClass
     */
    function getAppDetails(/* int */ $appId, $cc = 'US', $language = 'english')
    {
        $url = "http://store.steampowered.com/api/appdetails/?l=$language&cc=$cc&appids=$appId";

        try {
            $json = $this->getContent($url);
            $data = json_decode($json);
            $app = $data->{$appId};
            if (!$app->success) {
                return null;
            }
            return $app->data;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            if (!$e->getResponse()) {
                throw $e;
            }

            if ((string) $e->getResponse()->getBody() === 'null') {
                return null;
            }

            throw $e;
        }
    }

    /**
     * @param int $appId
     * @return null|\stdClass
     */
    function getAppUserDetails(/* int */ $appId) /*: array */
    {
        $url = "http://store.steampowered.com/api/appdetails/?appids=$appId";

        try {
            $json = $this->getContent($url);
            $data = json_decode($json);
            $app = $data->{$appId};
            if (!$app->success) {
                return null;
            }
            return $app->data;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            if (!$e->getResponse()) {
                throw $e;
            }

            if ((string) $e->getResponse()->getBody() === 'null') {
                return null;
            }

            throw $e;
        }
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
