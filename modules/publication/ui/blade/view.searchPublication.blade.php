<?php
include_once UTILITY.'class.util.php';
//include_once MODULES_THESIS.'bao/class.searchPublicationbao.php';
//include_once MODULES_THESIS.'bao/class.publicationbao.php';
include_once MODULE_PUBLICATION.'bao/class.searchPublicationbao.php';
include_once MODULE_PUBLICATION.'bao/class.publicationbao.php';

$_SearchPublicationBao=new SearchPublicationBao();
$_PublicationBao=new PublicationBao();
$_DB=DBUtil::getInstance();

?>

