<?php

use Locomotive\Tools\App;

require dirname(__FILE__) . '/../../core/tool.php';
require dirname(__FILE__) . '/../../core/tools/app.php';

class AppTest extends PHPUnit_Framework_TestCase
{

    public function testOne()
    {
        $app_id = 10;
        $expected = 'http://cdn.steampowered.com/v/gfx/apps/' . $app_id . '/header.jpg';
        $app_tools = new App();
        $actual = $app_tools->getAppLogoURL($app_id);
        $this->assertEquals($expected, $actual);
    }

}