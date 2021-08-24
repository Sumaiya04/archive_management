<!--Member CRUD-->
<?php
// write dao object for each class
include_once COMMON.'class.common.organisation.php';
include_once UTILITY.'class.util.php';

Class MemberDao
{

    private $_DB;
    private $_Member;
    private $_Year;
    private $_Blood;
    private $_Post;
    private $_Discipline;
    private $_Organisation;
    private $_Contact;

    function __construct()
    {

        $this->_DB = DBUtil::getInstance();
        $this->_Member = new Member();
        $this->_Year=new Year();
        $this->_Blood=new Blood();
        $this->_Post=new Post();
    }

    //create new member
    public function createMember($Member){

        $ID=$Member->getMemberId();
        $Photo=$Member->getMemberPhoto();
        $Name=$Member->getMemberName();
        $Address=$Member->getMemberAddress();
        $YearId=$Member->getMemberYearId();
        $BloodId=$Member->getMemberBloodId();
        $PostId=$Member->getMemberPostId();
        $DisciplineId=$Member->getMemberDisciplineId();
        $OrganisationId=$Member->getMemberOrganisationId();
        $Contact=$Member->getMemberContact();

        $SQL = "INSERT INTO pms_member VALUES('$ID','$Photo','$Name','$Address','$YearId','$BloodId','$PostId','$DisciplineId', '$OrganisationId','$Contact' )";

        $SQL = $this->_DB->doQuery($SQL);

        $Result = new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);

        return $Result;
    }

    //upload member photos
    public function uploadPhoto($Member)
    {
        $target_dir = './resources/img/thumbnails/';
        $target_file = $target_dir . basename($_FILES['photo']['name']);
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if (!empty($_FILES['photo']['tmp_name'])) {
            $size = getimagesize($_FILES['photo']['tmp_name']);
            $uploaded = 1;

            if ($size !== false) {
                //echo 'File is an image - '.$size['mime'].'.';
                $uploaded = 1;
            } else {
                echo '<br>File is not an image';
                $uploaded = 0;
            }

            if (file_exists($target_file)) {
                echo '<br>Sorry, file already exists';
                $uploaded = 0;
            }

            if ($_FILES['photo']['size'] > 5000000) {
                echo '<br>Sorry, your file is too large';
                $uploaded = 0;
            }

            if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg' && $fileType != 'ico') {
                echo '<br>Sorry, only jpg, jpeg, png & ico files are allowed';
                $uploaded = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploaded == 0) {
                echo "<br>Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if(isset($_POST['update'])){
                    $del_dir=$_POST['photosrc'];
                    unlink($del_dir);
                }
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir.$Member->getMemberName().'.'.$fileType)) {
                    $Upload = array();
                    //returns a boolean value
                    $Upload['uploaded'] = $uploaded;
                    //returns the directory of the uploaded file
                    $Upload['target_file'] = $target_dir.$Member->getMemberName().'.'.$fileType;
                    return $Upload;
                } else {
                    echo "<br>Sorry, there was an error uploading your file.";
                }
            }
        } else {
            if (!isset($_POST['update'])){
                echo "<br>Cannot upload the image.<br>Check image size.";
            }else{
                $Upload['uploaded']=1;
                $Upload['target_file']=$_POST['photosrc'];
                return $Upload;
            }
        }
    }

    //delete member photo
    public function deletePhoto($Member){
        $del_dir=$Member->getMemberPhoto();
        unlink($del_dir);

        return true;
    }

    //get All members
    public function getAllMembers(){
        $MemberList=array();

        $SQL="SELECT * FROM pms_member ORDER BY pms_member.post_id";
        $this->_DB->doQuery($SQL);

        $rows=$this->_DB->getAllRows();

        foreach ($rows as $row) {
            $this->_Member=new Member();
            $this->_Member->setMemberId($row['id']);
            $this->_Member->setMemberPhoto($row['photo']);
            $this->_Member->setMemberName($row['name']);
            $this->_Member->setMemberAddress($row['address']);
            $this->_Member->setMemberYearId($row['year_id']);
            $this->_Member->setMemberBloodId($row['blood_id']);
            $this->_Member->setMemberPostId($row['post_id']);
            $this->_Member->setMemberDisciplineId($row['discipline_id']);
            $this->_Member->setMemberOrganisationId($row['organisation_id']);
            $this->_Member->setMemberContact($row['contact']); 

            $MemberList[]=$this->_Member;
        }

        //todo: LOG util with level of log


        $Result = new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($MemberList);

        return $Result;

    }

    //Get All Years
    public function getAllYears(){
        $YearList=array();

        $SQL="SELECT * FROM tbl_year";
        $this->_DB->doQuery($SQL);

        $rows=$this->_DB->getAllRows();

        foreach ($rows as $row){

            $this->_Year=new Year();
            $this->_Year->setYearId($row['ID']);
            $this->_Year->setYearName($row['Name']);

            $YearList[]=$this->_Year;
        }

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($YearList);

        return $Result;
    }

    //get All Bloods
    public function getAllBloods(){
        $BloodList=array();

        $SQL="SELECT * FROM tbl_blood";
        $this->_DB->doQuery($SQL);

        $rows=$this->_DB->getAllRows();
        foreach ($rows as $row){
            $this->_Blood=new Blood();
            $this->_Blood->setBloodId($row['ID']);
            $this->_Blood->setBloodName($row['Name']);

            $BloodList[]=$this->_Blood;
        }

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($BloodList);

        return $Result;
    }

    //get All Posts
    public function getAllPosts(){
        $PostList=array();

        $SQL="SELECT * FROM tbl_post";
        $this->_DB->doQuery($SQL);

        $rows=$this->_DB->getAllRows();
        foreach ($rows as $row){
            $this->_Post=new Post();
            $this->_Post->setPostId($row['ID']);
            $this->_Post->setPostName($row['Name']);
            $PostList[]=$this->_Post;
        }

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($PostList);

        return $Result;
    }

    //get All Discipline
    public function getAllDisciplines(){
        $DisciplineList=array();

        $SQL="SELECT * FROM tbl_discipline";
        $this->_DB->doQuery($SQL);

        $rows=$this->_DB->getAllRows();
        foreach ($rows as $row){
            $this->_Discipline=new Discipline();
            $this->_Discipline->setDisciplineId($row['ID']);
            $this->_Discipline->setDisciplineName($row['Name']);
            $this->_Discipline->setDisciplineShortCode($row['ShortCode']);
            $this->_Discipline->setDisciplineSchoolId($row['SchoolID']);

            $DisciplineList[]=$this->_Discipline;
        }
        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($DisciplineList);

        return $Result;
    }

    //get All Organisation
    public function getAllOrganisations(){
        $OrganisationList=array();

        $SQL="SELECT * FROM oms_organisation";
        $this->_DB->doQuery($SQL);

        $rows=$this->_DB->getAllRows();
        foreach ($rows as $row) {
            $this->_Organisation=new Organisation();
            $this->_Organisation->setOrganisationId($row['id']);
            $this->_Organisation->setOrganisationLogo($row['logo']);
            $this->_Organisation->setOrganisationName($row['name']);
            $this->_Organisation->setOrganisationDescription($row['description']);
            $this->_Organisation->setOrganisationLink($row['link_add']);
            $this->_Organisation->setOrganisationMotto($row['motto']);
            $this->_Organisation->setOrganisationCreatedAt($row['created_at']);
            $this->_Organisation->setOrganisationUpdatedAt($row['updated_at']);

            $OrganisationList[]=$this->_Organisation;
        }
        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($OrganisationList);

        return $Result;
    }



    //get specific year
    public function getYear($Year){
        $SQL="SELECT * FROM tbl_year WHERE tbl_year.ID='".$Year."'";
        $this->_DB->doQuery($SQL);

        $row=$this->_DB->getTopRow();
        $this->_Year=new Year();
        $this->_Year->setYearId($row['ID']);
        $this->_Year->setYearName($row['Name']);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($this->_Year);
        
        return $Result;
    }

    //get specific blood
    public function getBlood($Blood){
        $SQL="SELECT * FROM tbl_blood WHERE tbl_blood.ID='".$Blood."'";
        $this->_DB->doQuery($SQL);

        $row=$this->_DB->getTopRow();
        $this->_Blood=new Blood();
        $this->_Blood->setBloodId($row['ID']);
        $this->_Blood->setBloodName($row['Name']);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($this->_Blood);

        return $Result;
    }

    //get specific post
    public function getPost($Post){
        $SQL="SELECT * FROM tbl_post WHERE tbl_post.ID='".$Post."'";
        $this->_DB->doQuery($SQL);

        $row=$this->_DB->getTopRow();
        $this->_Post=new Post();
        $this->_Post->setPostId($row['ID']);
        $this->_Post->setPostName($row['Name']);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($this->_Post);

        return $Result;
    }
    
    //get specific Discipline
    public function getDiscipline($Discipline){
        $SQL="SELECT * FROM tbl_discipline WHERE tbl_discipline.ID='".$Discipline."'";
        $this->_DB->doQuery($SQL);

        $row=$this->_DB->getTopRow();
        $this->_Discipline=new Discipline();
        $this->_Discipline->setDisciplineId($row['ID']);
        $this->_Discipline->setDisciplineName($row['Name']);
        $this->_Discipline->setDisciplineShortCode($row['ShortCode']);
        $this->_Discipline->setDisciplineSchoolId($row['SchoolID']);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($this->_Discipline);

        return $Result;
    }

    //get specific Organisation
    public function getOrganisation($Organisation){
        $SQL="SELECT * FROM oms_organisation WHERE oms_organisation.ID='".$Organisation."'";
        $this->_DB->doQuery($SQL);

        $row=$this->_DB->getTopRow();
            $this->_Organisation->setOrganisationId($row['id']);
            $this->_Organisation->setOrganisationLogo($row['logo']);
            $this->_Organisation->setOrganisationName($row['name']);
            $this->_Organisation->setOrganisationDescription($row['description']);
            $this->_Organisation->setOrganisationLink($row['link_add']);
            $this->_Organisation->setOrganisationMotto($row['motto']);
            $this->_Organisation->setOrganisationCreatedAt($row['created_at']);
            $this->_Organisation->setOrganisationUpdatedAt($row['updated_at']);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($this->_Organisation);

        return $Result;
    }
 
    
    //get specific member
    public function getMember($Member){

        $SQL="SELECT * FROM pms_member WHERE pms_member.id='".$Member->getMemberId()."'";
        $this->_DB->doQuery($SQL);

        $row=$this->_DB->getTopRow();
        $this->_Member=new Member();
        $this->_Member->setMemberId($row['id']);
        $this->_Member->setMemberPhoto($row['photo']);
        $this->_Member->setMemberName($row['name']);
        $this->_Member->setMemberAddress($row['address']);
        $this->_Member->setMemberYearId($row['year_id']);
        $this->_Member->setMemberBloodId($row['blood_id']);
        $this->_Member->setMemberPostId($row['post_id']);
        $this->_Member->setMemberDisciplineId($row['discipline_id']);
        $this->_Member->setMemberOrganisationId($row['organisation_id']);
        $this->_Member->setMemberContact($row['contact']); 

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($this->_Member);
        
        return $Result;
    }
    
    //update previous member
    public function updateMember($Member){
        $SQL="UPDATE pms_member SET pms_member.photo='".$Member->getMemberPhoto()."', pms_member.name='".$Member->getMemberName()."',pms_member.address='".$Member->getMemberAddress()."',
        pms_member.year_id='".$Member->getMemberYearId()."',
        pms_member.blood_id='".$Member->getMemberBloodId()."',
        pms_member.post_id='".$Member->getMemberPostId()."',
        pms_member.discipline_id='".$Member->getMemberDisciplineId()."',pms_member.organisation_id='".$Member->getMemberOrganisationId()."',pms_member.contact='".$Member->getMemberContact()."'
        WHERE pms_member.id='".$Member->getMemberId()."'";

        $SQL=$this->_DB->doQuery($SQL);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);
        
        return $Result;
    }
    
    //delete specific member
    public function deleteMember($Member){
        $SQL="DELETE FROM pms_member WHERE pms_member.id='".$Member->getMemberId()."'";
        $SQL=$this->_DB->doQuery($SQL);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);
        
        return $Result;
    }
    
}
?>
