<?php
include_once UTILITY.'class.util.php';
include_once MODULES_THESIS.'bao/class.thesisbao.php';
include_once MODULES_THESIS.'bao/class.thesisHomebao.php';

$_ThesisBao=new ThesisBao();
$_ThesisHomeBao=new ThesisHomeBao();
$_DB=DBUtil::getInstance();

?>
