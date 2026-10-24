<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Interfaces;

use PHPUnit\Framework\TestCase;
use Tsukanov\SteamLocomotive\Locomotive;

class ISteamWebAPIUtilTest extends TestCase
{
    /**
     * @var Locomotive
     */
    protected $lib;

    protected function setUp(): void
    {
        $this->lib = new Locomotive(null);
    }

    public function testApiList()
    {
        $this->assertIsObject($this->lib->ISteamWebAPIUtil->GetSupportedAPIList());
    }

    public function testServerInfo()
    {
        $this->assertIsObject($this->lib->ISteamWebAPIUtil->GetServerInfo());
    }

}