<?php
namespace Locomotive\Tools;

// TODO: Remove this class (see store tools)
/**
 * @deprecated See store tools.
 */
class App extends Tool
{

    function __construct()
    {
        $this->store = new Store();
    }

    /**
     * @deprecated See store tools.
     */
    function getAppLogoURL($app_id, $size = 'large')
    {
        return $this->store->getAppLogoURL($app_id, $size);
    }

    /**
     * @deprecated See store tools.
     */
    function getAppDetails($appids = array(), $cc = 'US', $language = 'english')
    {
        return $this->store->getAppDetails($appids, $cc, $language);
    }

    /**
     * @deprecated See store tools.
     */
    function getFeaturedApps($cc = 'US', $language = 'english')
    {
        return $this->store->getFeatured($cc, $language);
    }

    /**
     * @deprecated See store tools.
     */
    function getFeaturedCategories($cc = 'US', $language = 'english')
    {
        return $this->store->getFeaturedCategories($cc, $language);
    }

}