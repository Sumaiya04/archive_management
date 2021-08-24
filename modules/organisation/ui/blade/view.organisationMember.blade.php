<?php
include_once UTILITY.'class.util.php';
include_once MODULE_ORGANISATION.'bao/class.organisationMemberbao.php';
include_once MODULE_ORGANISATION.'bao/class.organisationbao.php';

$_OrganisationBao=new OrganisationBao();
$Organisation=new Organisation();
$_MemberBao=new OrganisationMemberBao();
$_DB=DBUtil::getInstance();
?>