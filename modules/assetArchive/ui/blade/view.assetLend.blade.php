<?php
include_once UTILITY.'class.util.php';
include_once MODULES_ASSET.'bao/class.assetLendBao.php';
include_once MODULES_ASSET.'bao/class.sendRepairBao.php';

$_DB=DBUtil::getInstance();
$_AssetLendBao=new AssetLendBao();
$_SendRepairBao=new SendRepairBao();

if (isset($_POST['lend'])){
    $Asset=$_SendRepairBao->getAssetIdBySerialNo($_POST['serialNo'])->getResultObject();

    $UserAsset=new UserAsset();
    $UserAsset->setUserAssetId(Util::getGUID());
    $UserAsset->setUserAssetUserId($_DB->secureInput($_POST['userId']));
    $UserAsset->setUserAssetAssetId($Asset->getAssetId());
    $UserAsset->setUserAssetLendingDate($_DB->secureInput($_POST['lendingDate']));

    $_AssetLendBao->lendAsset($UserAsset);
}