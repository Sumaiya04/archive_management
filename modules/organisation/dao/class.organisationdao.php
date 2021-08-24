<!--Organisation CRUD-->
<?php
// write dao object for each class
include_once COMMON.'class.common.organisation.php';
include_once UTILITY.'class.util.php';

Class OrganisationDao
{

    private $_DB;
    private $_Organisation;

    function __construct()
    {

        $this->_DB = DBUtil::getInstance();
        $this->_Organisation = new Organisation();
    }

    //create new organisation
    public function createOrganisation($Organisation){

        $ID=$Organisation->getOrganisationId();
        $Logo=$Organisation->getOrganisationLogo();
        $Name=$Organisation->getOrganisationName();
        $Description=$Organisation->getOrganisationDescription();
        $Link=$Organisation->getOrganisationLink();
        $Motto=$Organisation->getOrganisationMotto();

        $SQL = "INSERT INTO oms_organisation VALUES('$ID','$Logo','$Name','$Description', '$Motto', '$Link',CURRENT_TIMESTAMP ,CURRENT_TIMESTAMP )";

        $SQL = $this->_DB->doQuery($SQL);

        $Result = new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);

        return $Result;
    }
    //upload organisation logos
    public function uploadLogo($Organisation)
    {
        $target_dir = './resources/img/thumbnails/';
        $target_file = $target_dir . basename($_FILES['logo']['name']);
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if (!empty($_FILES['logo']['tmp_name'])) {
            $size = getimagesize($_FILES['logo']['tmp_name']);
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

            if ($_FILES['logo']['size'] > 5000000) {
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
                    $del_dir=$_POST['logosrc'];
                    unlink($del_dir);
                }
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_dir.$Organisation->getOrganisationName().'.'.$fileType)) {
                    $Upload = array();
                    //returns a boolean value
                    $Upload['uploaded'] = $uploaded;
                    //returns the directory of the uploaded file
                    $Upload['target_file'] = $target_dir.$Organisation->getOrganisationName().'.'.$fileType;
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
                $Upload['target_file']=$_POST['logosrc'];
                return $Upload;
            }
        }
    }

    //delete organisation logo
    public function deleteLogo($Organisation){
        $del_dir=$Organisation->getOrganisationLogo();
        unlink($del_dir);

        return true;
    }

    //get All organisations
    public function getAllOrganisations(){
        $OrganisationList=array();

        $SQL="SELECT * FROM oms_organisation ORDER BY oms_organisation.created_at";
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

        //todo: LOG util with level of log


        $Result = new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($OrganisationList);

        return $Result;

    }

    //get specific organisation
    public function getOrganisation($Organisation){

        $SQL="SELECT * FROM oms_organisation WHERE oms_organisation.id='".$Organisation->getOrganisationId()."'";
        $this->_DB->doQuery($SQL);

        $row=$this->_DB->getTopRow();
        $this->_Organisation=new Organisation();
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

    //update previous organisation
    public function updateOrganisation($Organisation){
        $SQL="UPDATE oms_organisation SET oms_organisation.logo='".$Organisation->getOrganisationLogo()."', oms_organisation.name='".$Organisation->getOrganisationName()."',oms_organisation.description='".$Organisation->getOrganisationDescription()."',
        oms_organisation.link_add='".$Organisation->getOrganisationLink()."',
        oms_organisation.motto='".$Organisation->getOrganisationMotto()."',
        oms_organisation.updated_at=CURRENT_TIMESTAMP WHERE oms_organisation.id='".$Organisation->getOrganisationId()."'";

        $SQL=$this->_DB->doQuery($SQL);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);
        
        return $Result;
    }

    //delete specific organisation
    public function deleteOrganisation($Organisation){
        $SQL="DELETE FROM oms_organisation WHERE oms_organisation.id='".$Organisation->getOrganisationId()."'";
        $SQL=$this->_DB->doQuery($SQL);

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($SQL);
        
        return $Result;
    }

}
?>