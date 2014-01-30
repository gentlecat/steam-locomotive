<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Tools;

use Tsukanov\SteamLocomotive\Core\Tools\App;

class AppToolsTest extends \PHPUnit_Framework_TestCase
{

    public function testGetAppLogoURL()
    {
        $app_id = 10;
        $expected = 'http://cdn.steampowered.com/v/gfx/apps/' . $app_id . '/header.jpg';
        $app_tools = new App();
        $actual = $app_tools->getAppLogoURL($app_id);
        $this->assertEquals($expected, $actual);
    }

}