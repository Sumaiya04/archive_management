<?php
include_once UTILITY.'class.util.php';
include_once MODULE_PUBLICATION.'bao/class.publicationbao.php';
include_once MODULE_PUBLICATION.'bao/class.publicationHomebao.php';

$_PublicationBao=new PublicationBao();
$_PublicationHomeBao=new PublicationHomeBao();
$_DB=DBUtil::getInstance();

?>
