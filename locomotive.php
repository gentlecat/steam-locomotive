<?php

define('LOCOMOTIVE_PATH', dirname(__FILE__) . '/');

require LOCOMOTIVE_PATH . 'config.php';
require LOCOMOTIVE_PATH . 'exceptions.php';

// Modules
require LOCOMOTIVE_PATH . 'modules/webapi.php';
require LOCOMOTIVE_PATH . 'modules/communityapi.php';
require LOCOMOTIVE_PATH . 'modules/tools.php';

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