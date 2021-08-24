<?php
include_once UTILITY.'class.util.php';
include_once MODULE_ORGANISATION.'dao/class.organisationMemberdao.php';

class OrganisationMemberBao{
    private $_MemberDao;

    public function __construct()
    {
        $this->_MemberDao=new OrganisationMemberDao();
    }
}