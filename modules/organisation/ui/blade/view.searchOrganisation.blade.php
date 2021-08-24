<?php

include_once UTILITY.'class.util.php';
include_once MODULE_ORGANISATION. 'bao/class.searchOrganisationbao.php';
include_once MODULE_ORGANISATION.'bao/class.organisationbao.php';

$_SearchOrganisationBao=new SearchOrganisationBao();
$_OrganisationBao=new OrganisationBao();
$_DB=DBUtil::getInstance();

?>