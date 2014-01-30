<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Interfaces;

use Tsukanov\SteamLocomotive\Locomotive;

class InterfacesTest extends \PHPUnit_Framework_TestCase
{

    public function testApiList()
    {
        $steam = new Locomotive(null);
        $list = $steam->ISteamWebAPIUtil->GetSupportedAPIList();
    }

}