<?php

define('LIB_PATH', dirname(__FILE__).'/');

require LIB_PATH . 'config.php';
require LIB_PATH . 'exceptions.php';

// Modules
require LIB_PATH . 'modules/webapi.php';
require LIB_PATH . 'modules/communityapi.php';
require LIB_PATH . 'modules/tools.php';

class Locomotive {

    function __construct() {
        $this->webapi = new WebAPI();
        $this->communityapi = new CommunityAPI();
        $this->tools = new Tools();
    }

}