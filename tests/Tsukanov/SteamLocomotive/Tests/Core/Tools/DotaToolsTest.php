<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Tools;

use Tsukanov\SteamLocomotive\Core\Tools\Dota;

class DotaToolsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Dota
     */
    protected $dota_tools;

    protected function setUp()
    {
        $this->dota_tools = new Dota();
    }

    public function testGetHeroIconURL()
    {
        $hero_name = 'techies';
        $this->assertEquals('http://media.steampowered.com/apps/dota2/images/heroes/' . $hero_name . '_sb.png', $this->dota_tools->getHeroIconURL($hero_name));
    }

    public function testGetItemIconURL()
    {
        $item_name = 'dagon';
        $this->assertEquals('http://media.steampowered.com/apps/dota2/images/items/' . $item_name . '_lg.png', $this->dota_tools->getItemIconURL($item_name));
    }

    function testGetHeroPickerData()
    {
        $this->dota_tools->getHeroPickerData();
    }

    function testGetItemData()
    {
        $this->dota_tools->getItemData();
    }

    function testGetAbilityData()
    {
        $this->dota_tools->getAbilityData();
    }

    function testGetUniqueUsers()
    {
        $this->dota_tools->getUniqueUsers();
    }

    function testGetIntlPrizePool()
    {
        $this->dota_tools->getIntlPrizePool();
    }

}