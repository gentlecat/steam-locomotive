<?php

define('LIB_PATH', dirname(__FILE__).'/');

require LIB_PATH.'config.php';
require LIB_PATH.'exceptions.php';

// Modules
require LIB_PATH.'webapi.php';
require LIB_PATH.'communityapi.php';
require LIB_PATH.'validator.php';

class Locomotive {

    function __construct() {
        $this->webapi = new WebAPI();
        $this->communityapi = new CommunityAPI();
        $this->validator = new Validator();
    }

}