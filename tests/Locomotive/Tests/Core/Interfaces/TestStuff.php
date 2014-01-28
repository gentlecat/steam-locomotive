<?php
namespace Locomotive\Tests\Core\Interfaces;

use Locomotive\Locomotive;

class TestStuff extends \PHPUnit_Framework_TestCase
{

    public function testApiList()
    {
        $steam = new Locomotive("poop");
        $list = $steam->ISteamWebAPIUtil->GetSupportedAPIList();
    }

}