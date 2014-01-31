<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Interfaces;

use Tsukanov\SteamLocomotive\Locomotive;

class ISteamWebAPIUtilTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Locomotive
     */
    protected $lib;

    protected function setUp()
    {
        $this->lib = new Locomotive(null);
    }

    public function testApiList()
    {
        $this->lib->ISteamWebAPIUtil->GetSupportedAPIList();
    }

    public function testServerInfo()
    {
        $this->lib->ISteamWebAPIUtil->GetServerInfo();
    }

}