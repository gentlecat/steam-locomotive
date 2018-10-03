<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Tools;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use Tsukanov\SteamLocomotive\Core\Tools\Store;

class StoreToolsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Store
     */
    protected $store_tools;
    protected $appids = array(10, 50);
    protected $packageids = array(4116);

    protected function setUp()
    {
        $this->store_tools = new Store();
    }
    public function testGetAppLogoURL()
    {
        $app_id = $this->appids[0];
        $this->assertEquals('http://cdn.akamai.steamstatic.com/steam/apps/' . $app_id . '/header.jpg',  $this->store_tools->getAppLogoURL($app_id));

        $app_id = $this->appids[1];
        $this->assertEquals('http://cdn.akamai.steamstatic.com/steam/apps/' . $app_id . '/header.jpg',  $this->store_tools->getAppLogoURL($app_id));
    }

    /**
     * @test
     * @group failing
     */
    function appdetails_will_be_null_if_response_was_not_succesful()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|\Tsukanov\SteamLocomotive\Core\Tools\Store $mockedStoreTools */
        $mockedStoreTools = $this->getMockBuilder('\Tsukanov\SteamLocomotive\Core\Tools\Store')
            ->setMethods(['getContent'])
            ->getMock();

        $mockedStoreTools->expects($this->exactly(2))
            ->method('getContent')
            ->willReturn('{"123": {"success": false}}');

        $this->assertEquals(null, $mockedStoreTools->getAppDetails(123));
        $this->assertEquals(null, $mockedStoreTools->getAppUserDetails(123));
    }

    /**
     * @group failing
     */
    function testGetAppDetails()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|\Tsukanov\SteamLocomotive\Core\Tools\Store $mockedStoreTools */
        $mockedStoreTools = $this->getMockBuilder('\Tsukanov\SteamLocomotive\Core\Tools\Store')
            ->setMethods(['getContent'])
            ->getMock();

        $mockedStoreTools->expects($this->once())
            ->method('getContent')
            ->willThrowException(ClientException::create(
                new Request('GET', 'something'),
                new Response(400, [], Stream::factory('null'))
            ));

        $this->assertEquals(null, $mockedStoreTools->getAppDetails(123));
    }

    function testGetAppUserDetails()
    {
        $result = $this->store_tools->getAppUserDetails(10);
        $this->assertEquals('Counter-Strike', $result->name);
    }

    function testGetPackageDetails()
    {
        $this->store_tools->getPackageDetails($this->packageids);
    }

    function testGetFeatured()
    {
        $this->store_tools->getFeatured();
    }

    function testGetFeaturedCategories()
    {
        $this->store_tools->getFeaturedCategories();
    }

    function testGetSalePage()
    {
        $this->store_tools->getSalePage(0);
    }
}