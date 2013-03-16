<?php

define('LOCOMOTIVE_PATH', dirname(__FILE__) . '/');
define('LOCOMOTIVE_CORE_PATH', LOCOMOTIVE_PATH . 'core/');

require LOCOMOTIVE_CORE_PATH . 'exceptions.php';

require LOCOMOTIVE_CORE_PATH . 'web_api_interface.php';
foreach (glob(LOCOMOTIVE_CORE_PATH . 'interfaces/*.php') as $filename) {
    require $filename;
}

require LOCOMOTIVE_CORE_PATH . 'tool.php';
foreach (glob(LOCOMOTIVE_CORE_PATH . 'tools/*.php') as $filename) {
    require $filename;
}

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
        $this->IDOTA2Match_816 = new IDOTA2Match_816();
        $this->IDOTA2Match_205790 = new IDOTA2Match_205790();
        $this->IEconDOTA2_570 = new IEconDOTA2_570();
        $this->IEconDOTA2_816 = new IEconDOTA2_816();
        $this->IEconDOTA2_205790 = new IEconDOTA2_205790();
        $this->IPlayerService = new IPlayerService();
        $this->ISteamApps = new ISteamApps();
        $this->ISteamGameServerAccount = new ISteamGameServerAccount();
        $this->ISteamRemoteStorage = new ISteamRemoteStorage();
        $this->ISteamUser = new ISteamUser();
        $this->ISteamUserStats = new ISteamUserStats();
        $this->ISteamWebAPIUtil = new ISteamWebAPIUtil();

        $this->tools = new LocomotiveTools();
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