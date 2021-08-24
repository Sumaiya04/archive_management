<!--Organisation CRUD-->
<?php
include_once UTILITY.'class.util.php';
include_once MODULE_ORGANISATION.'dao/class.organisationdao.php';

/*
	User Business Object
*/
Class OrganisationBao
{

    private $_OrganisationDao;

    function __construct()
    {

        $this->_OrganisationDao = new OrganisationDao();

    }

    //new Organisation creation
    public function createOrganisation($Organisation){

        $Result = $this->_OrganisationDao->createOrganisation($Organisation);

        if(!$Result->getIsSuccess())
            $Result->setResultObject("Database failure in OrganisationDao.newOrganisation()");

        return $Result;
    }


    //upload organisation logos
    public function uploadLogo($Organisation){
        $Upload=$this->_OrganisationDao->uploadLogo($Organisation);

        return $Upload;
    }

    //delete organisation logo
    public function deleteLogo($Organisation){
        $Delete=$this->_OrganisationDao->deleteLogo($Organisation);

        return $Delete;
    }

    //get All Organisations
    public function getAllOrganisations(){

        $Result=$this->_OrganisationDao->getAllOrganisations();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in OrganisationDao.getAllOrganisation()");
        }

        return $Result;
    }
//get specific organisation
public function getOrganisation($Organisation){
    $Result=$this->_OrganisationDao->getOrganisation($Organisation);

    if(!$Result->getIsSuccess()){
        $Result->setResultObject("Database failure in OrganisationDao.getOrganisation($Organisation)");
    }
    return $Result;
}

//update previous organisation
public function updateOrganisation($Organisation){
    $Result=$this->_OrganisationDao->updateOrganisation($Organisation);
    
    if(!$Result->getIsSuccess()){
        $Result->setResultObject("Database failure in OrganisationDao.updateOrganisation($Organisation)");
    }
    return $Result;
}

//delete specific organisation
public function deleteOrganisation($Organisation){
    $Result=$this->_OrganisationDao->deleteOrganisation($Organisation);

    if(!$Result->getIsSuccess()){
        $Result->setResultObject("Database failure in OrganisationDao.deleteOrganisation($Organisation)");
    }
    return $Result;
}

}
?>