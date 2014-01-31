<?php
namespace Tsukanov\SteamLocomotive\Tests;

use Tsukanov\SteamLocomotive\Locomotive;

class MainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Locomotive
     */
    protected $lib;
    protected $api_key;

    protected function setUp()
    {
        $this->api_key = 'poop';
        $this->lib = new Locomotive($this->api_key);
    }

    public function testAPIKey()
    {
        $this->assertEquals($this->api_key, $GLOBALS['LOCOMOTIVE_API_KEY']);
    }

    /**
     * Check if all interfaces are defined
     */
    public function testInterfaces()
    {
        foreach (glob(LOCOMOTIVE_INTERFACES_PATH . '*.php') as $filewithpath) {
            $file = str_replace(LOCOMOTIVE_INTERFACES_PATH, '', $filewithpath);
            $filename = substr($file, 0, -4);
            $this->assertTrue(isset($this->lib->$filename));
        }
    }

}