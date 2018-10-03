<?php

namespace Tsukanov\SteamLocomotive\Tests\Core\Tools;

use Tsukanov\SteamLocomotive\Core\Tools\Store;

class StoreToolsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Store
     */
    protected $storeTools;
    protected $appIds = array(80, 130);
    protected $packageIds = array(4116);

    protected function setUp()
    {
        $this->storeTools = new Store();
    }

    public function testGetAppLogoURL()
    {
        $appId = $this->appIds[0];
        $this->assertEquals(
            'http://cdn.akamai.steamstatic.com/steam/apps/' . $appId . '/header.jpg',
            $this->storeTools->getAppLogoURL($appId)
        );
    }

    function testGetAppDetails()
    {
        $this->storeTools->getAppDetails();
    }

    function testGetAppUserDetails()
    {
        $this->storeTools->getAppUserDetails($this->appIds);
    }

    function testGetPackageDetails()
    {
        $this->storeTools->getPackageDetails($this->packageIds);
    }

    function testGetFeatured()
    {
        $this->storeTools->getFeatured();
    }

    function testGetFeaturedCategories()
    {
        $this->storeTools->getFeaturedCategories();
    }

    function testGetSalePage()
    {
        $this->storeTools->getSalePage(0);
    }
}
