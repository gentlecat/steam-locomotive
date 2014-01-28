<?php
namespace Locomotive\Tests\Core\Tools;

use Locomotive\Core\Tools\App;

require dirname(__FILE__) . '/../../init.php';

class AppTest extends \PHPUnit_Framework_TestCase
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