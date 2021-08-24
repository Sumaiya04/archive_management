<!--Publications Homepage-->
<?php
// write dao object for each class
include_once COMMON.'class.common.publication.php';
include_once UTILITY.'class.util.php';

class PublicationHomeDao{

    private $_DB;
    private $_Publication;

    public function __construct()
    {
        $this->_DB=DBUtil::getInstance();
        $this->_Publication=new Publication();
    }

    //get paginated publication
    public function getLimitPublication($page,$limit){
        $PublicationList=array();
        $SQL="SELECT * FROM tms_publication ORDER BY tms_publication.created_at LIMIT $page,$limit";
        $this->_DB->doQuery($SQL);

        $rows=$this->_DB->getAllRows();
        foreach ($rows as $row){
            $this->_Publication=new Publication();
            $this->_Publication->setPublicationId($row['id']);
            $this->_Publication->setPublicationThumbnail($row['thumbnail']);
            $this->_Publication->setPublicationTitle($row['title']);
            $this->_Publication->setPublicationDescription($row['description']);
            $this->_Publication->setPublicationPDFLink($row['pdf_link']);
            $this->_Publication->setPublicationYearId($row['year_id']);
            $this->_Publication->setPublicationTermId($row['term_id']);
            $this->_Publication->setPublicationCourseId($row['course_id']);
            $this->_Publication->setPublicationDisciplineId($row['discipline_id']);
            $this->_Publication->setPublicationCreatedAt($row['created_at']);
            $this->_Publication->setPublicationUpdatedAt($row['updated_at']);

            $PublicationList[]=$this->_Publication;
        }

        
        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($PublicationList);
        
        return $Result;
    }
    
}
?>
