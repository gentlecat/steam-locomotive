<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Tools;

use Tsukanov\SteamLocomotive\Core\Tools\Dota;

class DotaToolsTest extends \PHPUnit_Framework_TestCase
{

    public function testGetHeroIconURL()
    {
        $dota_tools = new Dota();
        $hero_name = 'techies';
        $this->assertEquals('http://media.steampowered.com/apps/dota2/images/heroes/' . $hero_name . '_sb.png', $dota_tools->getHeroIconURL($hero_name));
    }

    public function testGetItemIconURL()
    {
        $dota_tools = new Dota();
        $item_name = 'dagon';
        $this->assertEquals('http://media.steampowered.com/apps/dota2/images/items/' . $item_name . '_lg.png', $dota_tools->getItemIconURL($item_name));
    }

    function testGetHeroPickerData()
    {
        $dota_tools = new Dota();
        $dota_tools->getHeroPickerData();
    }

    function testGetItemData()
    {
        $dota_tools = new Dota();
        $dota_tools->getItemData();
    }

    function testGetAbilityData()
    {
        $dota_tools = new Dota();
        $dota_tools->getAbilityData();
    }

    function testGetUniqueUsers()
    {
        $dota_tools = new Dota();
        $dota_tools->getUniqueUsers();
    }

    function testGetIntlPrizePool()
    {
        $dota_tools = new Dota();
        $dota_tools->getIntlPrizePool();
    }

}