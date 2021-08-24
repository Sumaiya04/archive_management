<!--Search specific organisation-->
<?php
// write dao object for each class
include_once COMMON.'class.common.organisation.php';
include_once UTILITY.'class.util.php';

Class SearchOrganisationDao
{
    private $_DB;
    private $_Organisation;

    public function __construct()
    {
        $this->_DB=DBUtil::getInstance();
        $this->_Organisation=new Organisation();
    }

    //Get Searched Organisation
    public function getSearchedOrganisation(){
        $Name="";

        if (isset($_POST['name'])){
            $Name=$_POST['name'];
        }

        $OrganisationList=array();

        if (isset($_POST['search'])&&!empty($_POST['name'])){
            $SQL="SELECT DISTINCT oms_organisation.id,oms_organisation.logo, oms_organisation.name
            FROM oms_organisation WHERE oms_organisation.name LIKE '%$Name%'";
            }

            $this->_DB->doQuery($SQL);

            $rows=$this->_DB->getAllRows();

            foreach ($rows as $row) {
                $this->_Organisation=new Organisation();
                $this->_Organisation->setOrganisationId($row['id']);
                $this->_Organisation->setOrganisationLogo($row['logo']);
                $this->_Organisation->setOrganisationName($row['name']);
                
                $OrganisationList[]=$this->_Organisation;

        }
        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($OrganisationList);
        return $Result;
    }
}

?>