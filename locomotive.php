<?php
namespace Locomotive;

define('LOCOMOTIVE_PATH', dirname(__FILE__) . '/');
define('LOCOMOTIVE_CORE_PATH', LOCOMOTIVE_PATH . 'core/');

// Importing interfaces
require LOCOMOTIVE_CORE_PATH . 'WebInterface.php';
define('LOCOMOTIVE_INTERFACES_PATH', LOCOMOTIVE_CORE_PATH . 'interfaces/');
foreach (glob(LOCOMOTIVE_INTERFACES_PATH . '*.php') as $filename) {
    require $filename;
}

// Importing tools
require LOCOMOTIVE_CORE_PATH . 'Tool.php';
define('LOCOMOTIVE_TOOLS_PATH', LOCOMOTIVE_CORE_PATH . 'tools/');
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
        $GLOBALS['api_key'] = $api_key;

        // Defining interfaces
        $this->IDOTA2Match_570 = new \Locomotive\Core\Interfaces\IDOTA2Match_570();
        $this->IDOTA2Match_816 = new \Locomotive\Core\Interfaces\IDOTA2Match_816();
        $this->IDOTA2Match_205790 = new \Locomotive\Core\Interfaces\IDOTA2Match_205790();
        $this->IEconDOTA2_570 = new \Locomotive\Core\Interfaces\IEconDOTA2_570();
        $this->IEconDOTA2_816 = new \Locomotive\Core\Interfaces\IEconDOTA2_816();
        $this->IEconDOTA2_205790 = new \Locomotive\Core\Interfaces\IEconDOTA2_205790();
        $this->IPlayerService = new \Locomotive\Core\Interfaces\IPlayerService();
        $this->ISteamApps = new \Locomotive\Core\Interfaces\ISteamApps();
        $this->ISteamGameServerAccount = new \Locomotive\Core\Interfaces\ISteamGameServerAccount();
        $this->ISteamRemoteStorage = new \Locomotive\Core\Interfaces\ISteamRemoteStorage();
        $this->ISteamUser = new \Locomotive\Core\Interfaces\ISteamUser();
        $this->ISteamUserStats = new \Locomotive\Core\Interfaces\ISteamUserStats();
        $this->ISteamWebAPIUtil = new \Locomotive\Core\Interfaces\ISteamWebAPIUtil();

        $this->tools = new LocomotiveTools();
    }

}

class LocomotiveTools
{

    public function __construct()
    {
        // Defining tools
        $this->store = new \Locomotive\Core\Tools\Store();
        $this->dota = new \Locomotive\Core\Tools\Dota();
        $this->user = new \Locomotive\Core\Tools\User();
        $this->app = new \Locomotive\Core\Tools\App(); // TODO: Remove (see store tools)
    }

}