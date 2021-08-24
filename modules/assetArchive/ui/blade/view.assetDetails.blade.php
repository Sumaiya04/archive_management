<?php
include_once UTILITY.'class.util.php';
include_once MODULES_ASSET.'bao/class.assetDetailsBao.php';
include_once MODULES_ASSET.'bao/class.assetBao.php';

$_DB=DBUtil::getInstance();
$_AssetDetailsBao=new AssetDetailsBao();
$_AssetBao=new AssetBao();
$Asset=new Asset();

if (isset($_GET['del'])){
    $_AssetDetailsBao->deleteRepair($_GET['del']);

    header("Location:".PageUtil::$ASSET_DETAILS."?serialNo=".$_GET['serialNo']);
}