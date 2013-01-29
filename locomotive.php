<?php

define('LOCOMOTIVE_PATH', dirname(__FILE__) . '/');
define('LOCOMOTIVE_CORE_PATH', LOCOMOTIVE_PATH . 'core/');
define('LOCOMOTIVE_INTERFACES_PATH', LOCOMOTIVE_CORE_PATH . 'interfaces/');
define('LOCOMOTIVE_LIBS_PATH', LOCOMOTIVE_CORE_PATH . 'libs/');

require LOCOMOTIVE_CORE_PATH . 'exceptions.php';
require LOCOMOTIVE_PATH . 'config.php';

require_once LOCOMOTIVE_LIBS_PATH . 'simple_html_dom.php';

require_once LOCOMOTIVE_CORE_PATH . 'api_interface.php';

require_once LOCOMOTIVE_CORE_PATH . 'tools.php';

/**
 * Main class of Steam Locomotive library
 */
class Locomotive
{

    function __construct()
    {
        require_once LOCOMOTIVE_INTERFACES_PATH . 'IDOTA2Match_570.php';
        $this->IDOTA2Match_570 = new IDOTA2Match_570();

        require_once LOCOMOTIVE_INTERFACES_PATH . 'IEconDOTA2_570.php';
        $this->IEconDOTA2_570 = new IEconDOTA2_570();

        require_once LOCOMOTIVE_INTERFACES_PATH . 'ISteamApps.php';
        $this->ISteamApps = new ISteamApps();

        require_once LOCOMOTIVE_INTERFACES_PATH . 'ISteamGameServerAccount.php';
        $this->ISteamGameServerAccount = new ISteamGameServerAccount();

        require_once LOCOMOTIVE_INTERFACES_PATH . 'ISteamRemoteStorage.php';
        $this->ISteamRemoteStorage = new ISteamRemoteStorage();

        require_once LOCOMOTIVE_INTERFACES_PATH . 'ISteamUser.php';
        $this->ISteamUser = new ISteamUser();

        require_once LOCOMOTIVE_INTERFACES_PATH . 'ISteamWebAPIUtil.php';
        $this->ISteamWebAPIUtil = new ISteamWebAPIUtil();

        require_once LOCOMOTIVE_CORE_PATH . 'communityapi.php';
        $this->communityapi = new CommunityAPI();

        $this->tools = new Tools();
    }

}