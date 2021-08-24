<!--Search specific publication-->
<?php
// write dao object for each class
include_once COMMON.'class.common.publication.php';
include_once UTILITY.'class.util.php';

Class SearchPublicationDao
{
    private $_DB;
    private $_Publication;
    private $_Student;

    public function __construct()
    {
        $this->_DB=DBUtil::getInstance();
        $this->_Publication=new Publication();
        $this->_Student=new User();
    }

    
    //Get Searched Publication
    public function getSearchedPublication(){
        $Title=$YearId=$TermId=$CourseId=$DisciplineId=$TeacherId=$MemberId=$CreatedAt="";

        if (isset($_POST['title'])){
            // Sanitize Search Title
            $rawTitle = $_POST['title'];
            $Title= preg_replace('/[^A-Za-z0-9\-]/', '', $rawTitle);
        }
        if (isset($_POST['year_id'])){
            $YearId=$_POST['year_id'];
        }
        if (isset($_POST['term_id'])){
            $TermId=$_POST['term_id'];
        }
        if (isset($_POST['course_id'])){
            $CourseId=$_POST['course_id'];
        }
        if (isset($_POST['discipline_id'])){
            $DisciplineId=$_POST['discipline_id'];
        }
        if (isset($_POST['teacher_id'])) {
            $TeacherId = $_POST['teacher_id'];
        }
        if (isset($_POST['member_id'])){
            $MemberId=$_POST['member_id'];
        }
        if (isset($_POST['created_at'])){
            $CreatedAt=$_POST['created_at'];
        }

        $PublicationList=array();

        if (isset($_POST['member_id'])&&!empty($_POST['member_id'])&&isset($_POST['teacher_id'])&&!empty($_POST['teacher_id'])){
            $SQL="SELECT DISTINCT tms_publication.id,tms_publication.thumbnail,tms_publication.title,tms_publication.description,tms_publication.pdf_link,
                  tms_publication.year_id,tms_publication.term_id,tms_publication.course_id,tms_publication.discipline_id,
                  tms_publication.created_at,tms_publication.updated_at 
                  FROM tms_publication INNER JOIN tms_student_publication ON tms_publication.id=tms_student_publication.publication_id INNER JOIN tms_supervisor_publication ON
                  tms_publication.id=tms_supervisor_publication.publication_id WHERE tms_publication.title LIKE '%$Title%'
                  AND tms_publication.year_id LIKE '%$YearId%' AND tms_publication.term_id LIKE '%$TermId%' AND tms_publication.course_id LIKE '%$CourseId%'
                  AND tms_publication.discipline_id LIKE '%$DisciplineId%' AND tms_supervisor_publication.supervisor_id LIKE '%$TeacherId%' AND tms_student_publication.student_id LIKE '%$MemberId%'
                  AND tms_publication.created_at LIKE '%$CreatedAt%'";

        }

        
        elseif (isset($_POST['member_id'])&&!empty($_POST['member_id'])) {
            $SQL="SELECT DISTINCT tms_publication.id,tms_publication.thumbnail,tms_publication.title,tms_publication.description,tms_publication.pdf_link,
                  tms_publication.year_id,tms_publication.term_id,tms_publication.course_id,tms_publication.discipline_id,
                  tms_publication.created_at,tms_publication.updated_at 
                  FROM tms_publication INNER JOIN tms_student_publication ON tms_publication.id=tms_student_publication.publication_id WHERE tms_publication.title LIKE '%$Title%'
                  AND tms_publication.year_id LIKE '%$YearId%' AND tms_publication.term_id LIKE '%$TermId%' AND tms_publication.course_id LIKE '%$CourseId%'
                  AND tms_publication.discipline_id LIKE '%$DisciplineId%' AND tms_student_publication.student_id LIKE '%$MemberId%'
                  AND tms_publication.created_at LIKE '%$CreatedAt%'";

        }elseif (isset($_POST['teacher_id'])&&!empty($_POST['teacher_id'])) {
            $SQL="SELECT DISTINCT tms_publication.id,tms_publication.thumbnail,tms_publication.title,tms_publication.description,tms_publication.pdf_link,
                  tms_publication.year_id,tms_publication.term_id,tms_publication.course_id,tms_publication.discipline_id,
                  tms_publication.created_at,tms_publication.updated_at 
                  FROM tms_publication INNER JOIN tms_supervisor_publication ON tms_publication.id=tms_supervisor_publication.publication_id WHERE tms_publication.title LIKE '%$Title%'
                  AND tms_publication.year_id LIKE '%$YearId%' AND tms_publication.term_id LIKE '%$TermId%' AND tms_publication.course_id LIKE '%$CourseId%'
                  AND tms_publication.discipline_id LIKE '%$DisciplineId%' AND tms_supervisor_publication.supervisor_id LIKE '%$TeacherId%'
                  AND tms_publication.created_at LIKE '%$CreatedAt%'";

        }else{
            $SQL="SELECT DISTINCT tms_publication.id,tms_publication.thumbnail,tms_publication.title,tms_publication.description,tms_publication.pdf_link,
                  tms_publication.year_id,tms_publication.term_id,tms_publication.course_id,tms_publication.discipline_id,
                  tms_publication.created_at,tms_publication.updated_at 
                  FROM tms_publication WHERE tms_publication.title LIKE '%$Title%' AND tms_publication.year_id LIKE '%$YearId%' 
                  AND tms_publication.term_id LIKE '%$TermId%' AND tms_publication.course_id LIKE '%$CourseId%'
                  AND tms_publication.discipline_id LIKE '%$DisciplineId%' AND tms_publication.created_at LIKE '%$CreatedAt%'";
        }

        $this->_DB->doQuery($SQL);

        $rows=$this->_DB->getAllRows();

        foreach ($rows as $row) {
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
    
    public function getAllStudents(){
        $StudentList=array();
        $SQL="SELECT tbl_user.ID,tbl_user.Email,tbl_user.FirstName,tbl_user.LastName FROM tbl_user INNER JOIN tbl_user_role ON tbl_user.ID=tbl_user_role.UserID
              INNER JOIN tbl_role ON tbl_user_role.RoleID=tbl_role.ID WHERE tbl_role.Name='Student'";

        $this->_DB->doQuery($SQL);
        $rows=$this->_DB->getAllRows();

        foreach ($rows as $row) {
            $this->_Student=new User();
            $this->_Student->setID($row['ID']);
            $this->_Student->setEmail($row['Email']);
            $this->_Student->setFirstName($row['FirstName']);
            $this->_Student->setLastName($row['LastName']);

            $StudentList[]=$this->_Student;
        }

        $Result=new Result();
        $Result->setIsSuccess(1);
        $Result->setResultObject($StudentList);
        
        return $Result;
    }
    

}
?>
