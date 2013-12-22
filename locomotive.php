<?php

define('LOCOMOTIVE_PATH', dirname(__FILE__) . '/');
define('LOCOMOTIVE_CORE_PATH', LOCOMOTIVE_PATH . 'core/');

// Importing interfaces
require LOCOMOTIVE_CORE_PATH . 'web_interface.php';
define('LOCOMOTIVE_INTERFACES_PATH', LOCOMOTIVE_CORE_PATH . 'interfaces/');
foreach (glob(LOCOMOTIVE_INTERFACES_PATH . '*.php') as $filename) {
    require $filename;
}

// Importing tools
require LOCOMOTIVE_CORE_PATH . 'tool.php';
define('LOCOMOTIVE_TOOLS_PATH', LOCOMOTIVE_CORE_PATH . 'tools/');
foreach (glob(LOCOMOTIVE_TOOLS_PATH . '*.php') as $filename) {
    require $filename;
}

/**
 * Main class of Steam Locomotive library
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
        $this->IDOTA2Match_570 = new \Locomotive\WebInterfaces\IDOTA2Match_570();
        $this->IDOTA2Match_816 = new \Locomotive\WebInterfaces\IDOTA2Match_816();
        $this->IDOTA2Match_205790 = new \Locomotive\WebInterfaces\IDOTA2Match_205790();
        $this->IEconDOTA2_570 = new \Locomotive\WebInterfaces\IEconDOTA2_570();
        $this->IEconDOTA2_816 = new \Locomotive\WebInterfaces\IEconDOTA2_816();
        $this->IEconDOTA2_205790 = new \Locomotive\WebInterfaces\IEconDOTA2_205790();
        $this->IPlayerService = new \Locomotive\WebInterfaces\IPlayerService();
        $this->ISteamApps = new \Locomotive\WebInterfaces\ISteamApps();
        $this->ISteamGameServerAccount = new \Locomotive\WebInterfaces\ISteamGameServerAccount();
        $this->ISteamRemoteStorage = new \Locomotive\WebInterfaces\ISteamRemoteStorage();
        $this->ISteamUser = new \Locomotive\WebInterfaces\ISteamUser();
        $this->ISteamUserStats = new \Locomotive\WebInterfaces\ISteamUserStats();
        $this->ISteamWebAPIUtil = new \Locomotive\WebInterfaces\ISteamWebAPIUtil();

        $this->tools = new LocomotiveTools();
    }

}

class LocomotiveTools
{

    public function __construct()
    {
        // Defining tools
        $this->app = new \Locomotive\Tools\App();
        $this->dota = new \Locomotive\Tools\Dota();
        $this->user = new \Locomotive\Tools\User();
    }

}