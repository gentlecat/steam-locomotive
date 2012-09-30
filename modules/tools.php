<?php

require LIB_PATH . 'modules/tools/usertools.php';
require LIB_PATH . 'modules/tools/grouptools.php';

class Tools {

    public function __construct() {
        $this->users = new UserTools();
        $this->groups = new GroupTools();
    }

}