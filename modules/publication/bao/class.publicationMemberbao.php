<!--Assign or remove members form a publication-->
<?php
include_once UTILITY.'class.util.php';
include_once MODULE_PUBLICATION.'dao/class.publicationMemberdao.php';

class PublicationMemberBao{
    private $_MemberDao;

    public function __construct()
    {
        $this->_MemberDao=new PublicationMemberDao();
    }

    //add Link
    public function addLink($LinkPublication){
        $Result=$this->_MemberDao->addLink($LinkPublication);

        if (!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberDao.addLink($LinkPublication)");
        }

        return $Result;
    }

    //add Member
    public function addMember($StudentPublication){
        $Result=$this->_MemberDao->addMember($StudentPublication);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberDao.addMember($StudentPublication)");
        }
        return $Result;
    }

    //add Supervisor
    public function addSupervisor($SupervisorPublication){
        $Result=$this->_MemberDao->addSupervisor($SupervisorPublication);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberDao.addSupervisor($SupervisorPublication)");
        }
        return $Result;
    }

    //get links of the publication
    public function getLink($Publication){
        $Result=$this->_MemberDao->getLink($Publication);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberDao.getLink($Publication)");
        }
        return $Result;
    }

    //get members of the publication
    public function getMember($Publication){
        $Result=$this->_MemberDao->getMember($Publication);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberDao.getMember($Publication)");
        }
        return $Result;
    }

    //get all students
    public function getStudent($Student){
        $Result=$this->_MemberDao->getStudent($Student);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberDao.getStudent($Student)");
        }
        return $Result;
    }

    //get supervisors of the publication
    public function getSupervisor($Publication){
        $Result=$this->_MemberDao->getSupervisor($Publication);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberDao.getSupervisor($Publication)");
        }
        return $Result;
    }

    //get all students
    public function getTeacher($Teacher){
        $Result=$this->_MemberDao->getTeacher($Teacher);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberDao.getTeacher($Teacher)");
        }
        return $Result;
    }

    //remove links from a publication
    public function removeLink($Link){
        $Result=$this->_MemberDao->removeLink($Link);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberDao.removeLink($Link)");
        }
        return $Result;
    }

    //remove members from a publication
    public function removeMember($Student){
        $Result=$this->_MemberDao->removeMember($Student);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberDao.removeMember($Student)");
        }
        return $Result;
    }

    //remove supervisors from a publication
    public function removeSupervisor($Supervisor){
        $Result=$this->_MemberDao->removeSupervisor($Supervisor);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in MemberDao.removeSupervisor($Supervisor)");
        }
        return $Result;
    }
}
?>
