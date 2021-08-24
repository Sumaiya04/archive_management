<!--Member CRUD-->
<?php
include_once UTILITY.'class.util.php';
include_once MODULE_ORGANISATION.'dao/class.memberFormdao.php';

/*
	User Business Object
*/
Class MemberBao
{

    private $_MemberDao;

    function __construct()
    {

        $this->_MemberDao = new MemberDao();

    }

    //new Member creation
    public function createMember($Member){

        $Result = $this->_MemberDao->createMember($Member);

        if(!$Result->getIsSuccess())
            $Result->setResultObject("Database failure in MemberFormDao.newMember()");

        return $Result;
    }

    //upload member photos
    public function uploadPhoto($Member){
        $Upload=$this->_MemberDao->uploadPhoto($Member);

        return $Upload;
    }

    //delete member photo
    public function deletePhoto($Member){
        $Delete=$this->_MemberDao->deletePhoto($Member);

        return $Delete;
    }

    //get All Members
    public function getAllMembers(){

        $Result=$this->_MemberDao->getAllMembers();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getAllMember()");
        }

        return $Result;
    }

    //get All Years
    public function getAllYears(){
        $Result=$this->_MemberDao->getAllYears();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getAllYears()");
        }

        return $Result;
    }

    //get All Blood groups
    public function getAllBloods(){
        $Result=$this->_MemberDao->getAllBloods();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getAllBloods()");
        }

        return $Result;
    }

    //get All posts
    public function getAllPosts(){
        $Result=$this->_MemberDao->getAllPosts();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getAllPosts()");
        }

        return $Result;
    }

    //get All Disciplines
    public function getAllDisciplines(){
        $Result=$this->_MemberDao->getAllDisciplines();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getAllDisciplines()");
        }

        return $Result;
    }

    //get All Organisations
    public function getAllOrganisations(){
        $Result=$this->_MemberDao->getAllOrganisations();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getAllOrganisations()");
        }

        return $Result;
    }


    //get specific year
    public function getYear($Year){
        $Result=$this->_MemberDao->getYear($Year);
        
        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getYear($Year)");
        }
        return $Result;
    }

    //get specific blood group
    public function getBlood($Blood){
        $Result=$this->_MemberDao->getBlood($Blood);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getBlood($Blood)");
        }
        return $Result;
    }

    //get specific post
    public function getPost($Post){
        $Result=$this->_MemberDao->getPost($Post);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getPost($Post)");
        }
        return $Result;
    }

    //get specific discipline
    public function getDiscipline($Discipline){
        $Result=$this->_MemberDao->getDiscipline($Discipline);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getDiscipline($Discipline)");
        }
        return $Result;
    }

    //get specific Organisation
    public function getOrganisation($Organisation){
        $Result=$this->_MemberDao->getOrganisation($Organisation);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getOrganisation($Organisation)");
        }
        return $Result;
    }

    //get specific member
    public function getMember($Member){
        $Result=$this->_MemberDao->getMember($Member);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.getMember($Member)");
        }
        return $Result;
    }
    
    //update previous member
    public function updateMember($Member){
        $Result=$this->_MemberDao->updateMember($Member);
        
        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.updateMember($Member)");
        }
        return $Result;
    }

    //delete specific member
    public function deleteMember($Member){
        $Result=$this->_MemberDao->deleteMember($Member);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberFormDao.deleteMember($Member)");
        }
        return $Result;
    }

}
?>
