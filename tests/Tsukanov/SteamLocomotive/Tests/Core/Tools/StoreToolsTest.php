<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Tools;

use Tsukanov\SteamLocomotive\Core\Tools\Store;

class StoreToolsTest extends \PHPUnit_Framework_TestCase
{

    public function testGetAppLogoURL()
    {
        $app_id = 10;
        $expected = 'http://cdn.steampowered.com/v/gfx/apps/' . $app_id . '/header.jpg';
        $store_tools = new Store();
        $actual = $store_tools->getAppLogoURL($app_id);
        $this->assertEquals($expected, $actual);
    }

}