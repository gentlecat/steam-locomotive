<?php

define('LOCOMOTIVE_PATH', dirname(__FILE__) . '/');
define('LOCOMOTIVE_CORE_PATH', LOCOMOTIVE_PATH . 'core/');

require 'vendor/autoload.php'; // Composer autoload

require LOCOMOTIVE_CORE_PATH . 'exceptions.php';

require LOCOMOTIVE_CORE_PATH . 'web_api_interface.php';
foreach (glob(LOCOMOTIVE_CORE_PATH . 'interfaces/*.php') as $filename) {
    require $filename;
}

require LOCOMOTIVE_CORE_PATH . 'tool.php';
foreach (glob(LOCOMOTIVE_CORE_PATH . 'tools/*.php') as $filename) {
    require $filename;
}

require LOCOMOTIVE_CORE_PATH . 'communityapi.php';

/**
 * Main class of Steam Locomotive library
 */
class Locomotive
{

    /**
     * @param string $api_key Steam API key
     */
    function __construct($api_key)
    {
        $GLOBALS['api_key'] = $api_key;

        $this->IDOTA2Match_570 = new IDOTA2Match_570();
        $this->IEconDOTA2_570 = new IEconDOTA2_570();
        $this->ISteamApps = new ISteamApps();
        $this->ISteamGameServerAccount = new ISteamGameServerAccount();
        $this->ISteamRemoteStorage = new ISteamRemoteStorage();
        $this->ISteamUser = new ISteamUser();
        $this->ISteamUserStats = new ISteamUserStats();
        $this->ISteamWebAPIUtil = new ISteamWebAPIUtil();

        $this->tools = new LocomotiveTools();

        // TODO: Remove (deprecated)
        $this->communityapi = new CommunityAPI();
    }

}

class LocomotiveTools
{

    public function __construct()
    {
        $this->users = new UserTools();
        $this->groups = new GroupTools();
        $this->apps = new AppTools();
        $this->dota = new DotaTools();
    }

}