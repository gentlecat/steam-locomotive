<?php

define('LIB_PATH', dirname(__FILE__) . '/');

require LIB_PATH . 'config.php';
require LIB_PATH . 'exceptions.php';

// Modules
require LIB_PATH . 'modules/webapi.php';
require LIB_PATH . 'modules/communityapi.php';
require LIB_PATH . 'modules/tools.php';

// Types
define('TYPE_STEAM_ID', 'steamid');
define('TYPE_COMMUNITY_ID', 'communityid');
define('TYPE_VANITY', 'vanity');

/**
 * Main class of Steam Locomotive library
 */
class Locomotive
{

    function __construct()
    {
        // TODO: Add logging
        $this->webapi = new WebAPI();
        $this->communityapi = new CommunityAPI();
        $this->tools = new Tools();
    }

}