<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Tools;

use Tsukanov\SteamLocomotive\Core\Tools\Store;

class StoreToolsTest extends \PHPUnit_Framework_TestCase
{
    protected $appids = array(10, 50);
    protected $packageids = array(4116);

    public function testGetAppLogoURL()
    {
        $store_tools = new Store();

        $app_id = $this->appids[0];
        $this->assertEquals('http://cdn.steampowered.com/v/gfx/apps/' . $app_id . '/header.jpg', $store_tools->getAppLogoURL($app_id));

        $app_id = $this->appids[1];
        $this->assertEquals('http://cdn.steampowered.com/v/gfx/apps/' . $app_id . '/header.jpg', $store_tools->getAppLogoURL($app_id));
    }

    function testGetAppDetails()
    {
        $store_tools = new Store();
        $store_tools->getAppDetails();
    }

    function testGetAppUserDetails()
    {
        $store_tools = new Store();
        $store_tools->getAppUserDetails($this->appids);
    }

    function testGetPackageDetails()
    {
        $store_tools = new Store();
        $store_tools->getPackageDetails($this->packageids);
    }

    function testGetFeatured()
    {
        $store_tools = new Store();
        $store_tools->getFeatured();
    }

    function testGetFeaturedCategories()
    {
        $store_tools = new Store();
        $store_tools->getFeaturedCategories();
    }

    function testGetSalePage()
    {
        $store_tools = new Store();
        $store_tools->getSalePage(0);
    }

}