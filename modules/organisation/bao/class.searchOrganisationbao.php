<!--Search specific organisation-->
<?php
include_once UTILITY.'class.util.php';
include_once MODULE_ORGANISATION.'dao/class.searchOrganisationdao.php';

/*
	User Business Object
*/
Class SearchOrganisationBao
{

    private $_SearchOrganisationDao;

    public function __construct()
    {
        $this->_SearchOrganisationDao=new SearchOrganisationDao();
    }
    
    //get searched organisation
    public function getSearchedOrganisation(){
        $Result=$this->_SearchOrganisationDao->getSearchedOrganisation();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in SearchOrganisationDao.getSearchedOrganisation()");
        }
        return $Result;
    }
}
    ?>