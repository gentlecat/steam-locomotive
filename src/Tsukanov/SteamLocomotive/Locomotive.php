<?php
namespace Tsukanov\SteamLocomotive;

use Tsukanov\SteamLocomotive\Core\Interfaces;
use Tsukanov\SteamLocomotive\Core\Tools;

define('LOCOMOTIVE_PATH', dirname(__FILE__) . '/');
define('LOCOMOTIVE_CORE_PATH', LOCOMOTIVE_PATH . 'Core/');

// Importing interfaces
require LOCOMOTIVE_CORE_PATH . 'WebInterface.php';
define('LOCOMOTIVE_INTERFACES_PATH', LOCOMOTIVE_CORE_PATH . 'Interfaces/');
foreach (glob(LOCOMOTIVE_INTERFACES_PATH . '*.php') as $filename) {
    require $filename;
}

// Importing tools
require LOCOMOTIVE_CORE_PATH . 'Tool.php';
define('LOCOMOTIVE_TOOLS_PATH', LOCOMOTIVE_CORE_PATH . 'Tools/');
foreach (glob(LOCOMOTIVE_TOOLS_PATH . '*.php') as $filename) {
    require $filename;
}

/**
 * Main class
 */
class Locomotive
{

    /**
     * @param string $api_key Steam API key from http://steamcommunity.com/dev/apikey/
     */
    function __construct($api_key)
    {
        $GLOBALS['LOCOMOTIVE_API_KEY'] = $api_key;

        // Defining interfaces
        $this->IDOTA2Match_570 = new Interfaces\IDOTA2Match_570();
        $this->IDOTA2Match_816 = new Interfaces\IDOTA2Match_816();
        $this->IDOTA2Match_205790 = new Interfaces\IDOTA2Match_205790();
        $this->IEconDOTA2_570 = new Interfaces\IEconDOTA2_570();
        $this->IEconDOTA2_816 = new Interfaces\IEconDOTA2_816();
        $this->IEconDOTA2_205790 = new Interfaces\IEconDOTA2_205790();
        $this->IPlayerService = new Interfaces\IPlayerService();
        $this->ISteamApps = new Interfaces\ISteamApps();
        $this->ISteamGameServerAccount = new Interfaces\ISteamGameServerAccount();
        $this->ISteamRemoteStorage = new Interfaces\ISteamRemoteStorage();
        $this->ISteamUser = new Interfaces\ISteamUser();
        $this->ISteamUserStats = new Interfaces\ISteamUserStats();
        $this->ISteamWebAPIUtil = new Interfaces\ISteamWebAPIUtil();

        $this->tools = new LocomotiveTools();
    }

}

class LocomotiveTools
{

    public function __construct()
    {
        // Defining tools
        $this->store = new Tools\Store();
        $this->dota = new Tools\Dota();
        $this->user = new Tools\User();
        $this->app = new Tools\App(); // TODO: Remove (see store tools)
    }

}