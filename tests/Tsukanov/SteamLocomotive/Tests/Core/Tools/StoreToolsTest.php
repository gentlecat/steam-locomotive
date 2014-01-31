<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Tools;

use Tsukanov\SteamLocomotive\Core\Tools\Store;

class StoreToolsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Store
     */
    protected $store_tools;
    protected $appids = array(10, 50);
    protected $packageids = array(4116);

    protected function setUp()
    {
        $this->store_tools = new Store();
    }
    public function testGetAppLogoURL()
    {
        $app_id = $this->appids[0];
        $this->assertEquals('http://cdn.steampowered.com/v/gfx/apps/' . $app_id . '/header.jpg',  $this->store_tools->getAppLogoURL($app_id));

        $app_id = $this->appids[1];
        $this->assertEquals('http://cdn.steampowered.com/v/gfx/apps/' . $app_id . '/header.jpg',  $this->store_tools->getAppLogoURL($app_id));
    }

    function testGetAppDetails()
    { $this->store_tools->getAppDetails();
    }

    function testGetAppUserDetails()
    { $this->store_tools->getAppUserDetails($this->appids);
    }

    function testGetPackageDetails()
    { $this->store_tools->getPackageDetails($this->packageids);
    }

    function testGetFeatured()
    { $this->store_tools->getFeatured();
    }

    function testGetFeaturedCategories()
    { $this->store_tools->getFeaturedCategories();
    }

    function testGetSalePage()
    { $this->store_tools->getSalePage(0);
    }

}