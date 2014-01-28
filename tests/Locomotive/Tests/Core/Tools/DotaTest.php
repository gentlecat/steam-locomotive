<?php
namespace Locomotive\Tests\Core\Tools;

use Locomotive\Core\Tools\Dota;

require dirname(__FILE__) . '/../../init.php';

class DotaTest extends \PHPUnit_Framework_TestCase
{

    public function testGetHeroIconURL()
    {
        $hero_name = 'techies';
        $expected = 'http://media.steampowered.com/apps/dota2/images/heroes/' . $hero_name . '_sb.png';
        $dota_tools = new Dota();
        $actual = $dota_tools->getHeroIconURL($hero_name);
        $this->assertEquals($expected, $actual);
    }

    public function testGetItemIconURL()
    {
        $item_name = 'dagon';
        $expected = 'http://media.steampowered.com/apps/dota2/images/items/' . $item_name . '_lg.png';
        $dota_tools = new Dota();
        $actual = $dota_tools->getItemIconURL($item_name);
        $this->assertEquals($expected, $actual);
    }

}