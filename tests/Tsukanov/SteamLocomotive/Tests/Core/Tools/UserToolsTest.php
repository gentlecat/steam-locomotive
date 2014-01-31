<?php
namespace Tsukanov\SteamLocomotive\Tests\Core\Tools;

use Tsukanov\SteamLocomotive\Core\Tools\User;

class UserToolsTest extends \PHPUnit_Framework_TestCase
{

    public function testCommunityIdConverter()
    {
        $user_tools = new User();
        $this->assertEquals(76561197960287930, $user_tools->convertToCommunityId(76561197960287930));
        $this->assertEquals(76561197960287930, $user_tools->convertToCommunityId("STEAM_0:0:11101"));
        $this->assertEquals(76561197960287930, $user_tools->convertToCommunityId("0:0:11101"));
    }

    public function testIdTypeDetector()
    {
        $user_tools = new User();
        $this->assertEquals(USER_ID_TYPE_VANITY, $user_tools->getTypeOfId("Rabscuttle"));
        $this->assertEquals(USER_ID_TYPE_COMMUNITY, $user_tools->getTypeOfId(76561197960287930));
        $this->assertEquals(USER_ID_TYPE_STEAM, $user_tools->getTypeOfId("STEAM_0:0:11101"));
        $this->assertEquals(USER_ID_TYPE_STEAM, $user_tools->getTypeOfId("0:0:11101"));
    }

    public function testIdValidator()
    {
        $user_tools = new User();
        $this->assertTrue($user_tools->validateUserId("Rabscuttle", USER_ID_TYPE_VANITY));
        $this->assertTrue($user_tools->validateUserId(76561197960287930, USER_ID_TYPE_COMMUNITY));
        $this->assertTrue($user_tools->validateUserId("STEAM_0:0:11101", USER_ID_TYPE_STEAM));
        $this->assertTrue($user_tools->validateUserId("0:0:11101", USER_ID_TYPE_STEAM));
    }

}