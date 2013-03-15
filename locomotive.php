<?php

define('LOCOMOTIVE_PATH', dirname(__FILE__) . '/');
define('LOCOMOTIVE_CORE_PATH', LOCOMOTIVE_PATH . 'core/');
define('LOCOMOTIVE_INTERFACES_PATH', LOCOMOTIVE_CORE_PATH . 'interfaces/');

require 'vendor/autoload.php'; // Composer autoload
require LOCOMOTIVE_PATH . 'config.php';
require LOCOMOTIVE_CORE_PATH . 'exceptions.php';
require LOCOMOTIVE_CORE_PATH . 'api_interface.php';
require LOCOMOTIVE_CORE_PATH . 'tools.php';
require LOCOMOTIVE_CORE_PATH . 'communityapi.php';

/**
 * Interfaces
 */
require LOCOMOTIVE_INTERFACES_PATH . 'IDOTA2Match_570.php';
require LOCOMOTIVE_INTERFACES_PATH . 'IEconDOTA2_570.php';
require LOCOMOTIVE_INTERFACES_PATH . 'ISteamApps.php';
require LOCOMOTIVE_INTERFACES_PATH . 'ISteamGameServerAccount.php';
require LOCOMOTIVE_INTERFACES_PATH . 'ISteamRemoteStorage.php';
require LOCOMOTIVE_INTERFACES_PATH . 'ISteamUser.php';
require LOCOMOTIVE_INTERFACES_PATH . 'ISteamUserStats.php';
require LOCOMOTIVE_INTERFACES_PATH . 'ISteamWebAPIUtil.php';

/**
 * Main class of Steam Locomotive library
 */
class Locomotive
{

    function __construct()
    {
        $this->tools = new Tools();

        $this->communityapi = new CommunityAPI();

        $this->IDOTA2Match_570 = new IDOTA2Match_570();
        $this->IEconDOTA2_570 = new IEconDOTA2_570();
        $this->ISteamApps = new ISteamApps();
        $this->ISteamGameServerAccount = new ISteamGameServerAccount();
        $this->ISteamRemoteStorage = new ISteamRemoteStorage();
        $this->ISteamUser = new ISteamUser();
        $this->ISteamUserStats = new ISteamUserStats();
        $this->ISteamWebAPIUtil = new ISteamWebAPIUtil();
    }

}