<?php
// write dao object for each class
include_once COMMON.'class.common.asset.php';
include_once UTILITY.'class.util.php';

Class AssetReturnDao
{

    private $_DB;

    function __construct()
    {
        $this->_DB = DBUtil::getInstance();
    }
}