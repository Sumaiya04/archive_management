<!--Assign or remove members to a publication-->
<?php
// write dao object for each class
include_once COMMON.'class.common.publication.php';
include_once UTILITY.'class.util.php';

class PublicationMemberDao{
    private $_DB;
    private $_StudentPublication;
    private $_SupervisorPublication;
    private $_LinkPublication;
    private $_Student;
    private $_Teacher;

    public function __construct()
    {
        $this->_DB=DBUtil::getInstance();
        $this->_StudentPublication=new StudentPublication();
        $this->_SupervisorPublication=new SupervisorPublication();
        $this->_LinkPublication=new LinkPublication();
        $this->_Teacher=new User();
        $this->_Student=new User();
    }

    public function addLink($LinkPublication){
        $ID=$LinkPublication->getLinkPublicationId();
        $Link=$LinkPublication->getLink();
        $PublicationId=$LinkPublication->getPublicationId();

        $SQL="INSERT INTO tms_link_publication VALUES('$ID','$Link','$PublicationId')";
        $SQL=$this->_DB->doQuery($SQL);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);

        return $Result;
    }

    public function addMember($StudentPublication){
        $ID=$StudentPublication->getStudentPublicationId();
        $PublicationId=$StudentPublication->getPublicationId();
        $StudentId=$StudentPublication->getStudentId();
        $Contribution=$StudentPublication->getContribution();

        $SQL="INSERT INTO tms_student_publication VALUES ('$ID','$StudentId','$PublicationId','$Contribution')";
        $SQL=$this->_DB->doQuery($SQL);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);

        return $Result;
    }

    public function addSupervisor($SupervisorPublication){
        $ID=$SupervisorPublication->getSupervisorPublicationId();
        $PublicationId=$SupervisorPublication->getPublicationId();
        $SupervisorId=$SupervisorPublication->getSupervisorId();

        $SQL="INSERT INTO tms_supervisor_publication VALUES ('$ID','$SupervisorId','$PublicationId')";
        $SQL=$this->_DB->doQuery($SQL);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);

        return $Result;
    }

    public function getLink($Publication){
        $LinkList=array();
        $SQL="SELECT * FROM tms_link_publication WHERE tms_link_publication.publication_id='".$Publication->getPublicationId()."'";
        $this->_DB->doQuery($SQL);

        $rows=$this->_DB->getAllRows();
        foreach ($rows as $row) {
            $this->_LinkPublication=new LinkPublication();
            $this->_LinkPublication->setLinkPublicationId($row['id']);
            $this->_LinkPublication->setLink($row['link']);
            $this->_LinkPublication->setPublicationId($row['publication_id']);

            $LinkList[]=$this->_LinkPublication;
        }

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($LinkList);

        return $Result;
    }

    public function getMember($Publication){
        $MemberList=array();
        $SQL="SELECT * FROM tms_student_publication WHERE tms_student_publication.publication_id='".$Publication->getPublicationId()."'";
        $this->_DB->doQuery($SQL);

        $rows=$this->_DB->getAllRows();
        foreach ($rows as $row) {
            $this->_StudentPublication=new StudentPublication();
            $this->_StudentPublication->setStudentPublicationId($row['id']);
            $this->_StudentPublication->setStudentId($row['student_id']);
            $this->_StudentPublication->setPublicationId($row['publication_id']);
            $this->_StudentPublication->setContribution($row['contribution']);

            $MemberList[]=$this->_StudentPublication;
        }

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($MemberList);

        return $Result;
    }

    public function getStudent($Student){
        $SQL="SELECT tbl_user.ID,tbl_user.Email,tbl_user.FirstName,tbl_user.LastName FROM tbl_user WHERE tbl_user.ID='".$Student."'";
        $this->_DB->doQuery($SQL);
        $row=$this->_DB->getTopRow();
        $this->_Student=new User();
        $this->_Student->setID($row['ID']);
        $this->_Student->setEmail($row['Email']);
        $this->_Student->setFirstName($row['FirstName']);
        $this->_Student->setLastName($row['LastName']);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($this->_Student);

        return $Result;
    }

    public function getSupervisor($Publication){
        $SupervisorList=array();
        $SQL="SELECT * FROM tms_supervisor_publication WHERE tms_supervisor_publication.publication_id='".$Publication->getPublicationId()."'";
        $this->_DB->doQuery($SQL);

        $rows=$this->_DB->getAllRows();
        foreach ($rows as $row) {
            $this->_SupervisorPublication=new SupervisorPublication();
            $this->_SupervisorPublication->setSupervisorPublicationId($row['id']);
            $this->_SupervisorPublication->setSupervisorId($row['supervisor_id']);
            $this->_SupervisorPublication->setPublicationId($row['publication_id']);

            $SupervisorList[]=$this->_SupervisorPublication;
        }

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SupervisorList);

        return $Result;
    }

    public function getTeacher($Teacher){
        $SQL="SELECT tbl_user.ID,tbl_user.Email,tbl_user.FirstName,tbl_user.LastName FROM tbl_user WHERE tbl_user.ID='".$Teacher."'";
        $this->_DB->doQuery($SQL);
        $row=$this->_DB->getTopRow();
        $this->_Teacher=new User();
        $this->_Teacher->setID($row['ID']);
        $this->_Teacher->setEmail($row['Email']);
        $this->_Teacher->setFirstName($row['FirstName']);
        $this->_Teacher->setLastName($row['LastName']);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($this->_Teacher);

        return $Result;
    }

    public function removeLink($Link){
        $SQL="DELETE FROM tms_link_publication WHERE tms_link_publication.publication_id='".$Link->getPublicationId()."' 
        AND tms_link_publication.id='".$Link->getLinkPublicationId()."'";

        $SQL=$this->_DB->doQuery($SQL);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);

        return $Result;
    }


    public function removeMember($Student){
        $SQL="DELETE FROM tms_student_publication WHERE tms_student_publication.publication_id='".$Student->getPublicationId()."' 
        AND tms_student_publication.student_id='".$Student->getStudentId()."'";

        $SQL=$this->_DB->doQuery($SQL);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);

        return $Result;
    }

    public function removeSupervisor($Supervisor){
        $SQL="DELETE FROM tms_supervisor_publication WHERE tms_supervisor_publication.publication_id='".$Supervisor->getPublicationId()."' 
        AND tms_supervisor_publication.supervisor_id='".$Supervisor->getSupervisorId()."'";

        $SQL=$this->_DB->doQuery($SQL);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);

        return $Result;
    }

}
?>
