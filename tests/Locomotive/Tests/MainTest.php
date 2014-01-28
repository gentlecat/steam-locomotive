<?php
namespace Locomotive\Tests;

use Locomotive\Locomotive;

require dirname(__FILE__) . '/init.php';

class MainTest extends \PHPUnit_Framework_TestCase
{
    protected $api_key;
    protected $lib;

    public function testAPIKey()
    {
        $this->assertEquals($this->api_key, $GLOBALS['api_key']);
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

    protected function setUp()
    {
        $this->api_key = '3SBF1EF97F8D6E402S4A10BQB704E64C';
        $this->lib = new Locomotive($this->api_key);
    }

}