<?php
include_once UTILITY.'class.util.php';
include_once MODULES_ASSET.'dao/class.assetReturnDao.php';

/*
	User Business Object
*/
Class AssetReturnBao
{

    private $_AssetReturnDao;

    function __construct()
    {
        $this->_AssetReturnDao = new AssetReturnDao();

    }
}