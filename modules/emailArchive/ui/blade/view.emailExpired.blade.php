<?php
include_once UTILITY.'class.util.php';
include_once MODULES_EMAIL.'bao/class.emailbao.php';
include_once MODULES_EMAIL.'bao/class.emailExpiredbao.php';

$_EmailExpiredBao=new EmailExpiredBao();
$_EmailBao=new EmailBao();
$_DB=DBUtil::getInstance();

?>