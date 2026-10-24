<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Tools;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tsukanov\SteamLocomotive\Core\Tools\Store;

class StoreToolsTest extends TestCase
{
    /**
     * @var Store
     */
    protected $store_tools;
    protected $appids = array(10, 50);
    protected $packageids = array(4116);

    protected function setUp(): void
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

    #[Test]
    #[Group('failing')]
    function appdetails_will_be_null_if_response_was_not_succesful()
    {
        /** @var MockObject&Store $mockedStoreTools */
        $mockedStoreTools = $this->getMockBuilder(Store::class)
            ->onlyMethods(['getContent'])
            ->getMock();

        $mockedStoreTools->expects($this->exactly(2))
            ->method('getContent')
            ->willReturn('{"123": {"success": false}}');

        $this->assertNull($mockedStoreTools->getAppDetails(123));
        $this->assertNull($mockedStoreTools->getAppUserDetails(123));
    }

    #[Group('failing')]
    function testGetAppDetails()
    {
        /** @var MockObject&Store $mockedStoreTools */
        $mockedStoreTools = $this->getMockBuilder(Store::class)
            ->onlyMethods(['getContent'])
            ->getMock();

        $mockedStoreTools->expects($this->once())
            ->method('getContent')
            ->willThrowException(new ClientException(
                'Bad Request',
                new Request('GET', 'something'),
                new Response(400, [], 'null')
            ));

        $this->assertNull($mockedStoreTools->getAppDetails(123));
    }

    function testGetAppUserDetails()
    {
        $result = $this->store_tools->getAppUserDetails(10);
        $this->assertEquals('Counter-Strike', $result->name);
    }

    function testGetPackageDetails()
    {
        $this->assertIsObject($this->store_tools->getPackageDetails($this->packageids));
    }

    function testGetFeatured()
    {
        $this->assertIsObject($this->store_tools->getFeatured());
    }

    function testGetFeaturedCategories()
    {
        $this->assertIsObject($this->store_tools->getFeaturedCategories());
    }

    function testGetSalePage()
    {
        $this->assertIsObject($this->store_tools->getSalePage(0));
    }
}