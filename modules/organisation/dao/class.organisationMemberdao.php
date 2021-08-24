<?php
// write dao object for each class
include_once COMMON.'class.common.organisation.php';
include_once UTILITY.'class.util.php';

class OrganisationMemberDao{
    private $_DB;

    public function __construct()
    {
        $this->_DB=DBUtil::getInstance();
      
    }
}