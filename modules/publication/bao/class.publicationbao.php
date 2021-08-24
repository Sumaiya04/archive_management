<!--Publication CRUD-->
<?php
include_once UTILITY.'class.util.php';
include_once MODULE_PUBLICATION.'dao/class.publicationdao.php';

/*
	User Business Object
*/
Class PublicationBao
{

    private $_PublicationDao;

    function __construct()
    {

        $this->_PublicationDao = new PublicationDao();

    }

    //new Publication creation
    public function createPublication($Publication){

        $Result = $this->_PublicationDao->createPublication($Publication);

        if(!$Result->getIsSuccess())
            $Result->setResultObject("Database failure in PublicationDao.newPublication()");

        return $Result;
    }

     //upload publication report
    public function uploadReport($Publication){
        $Upload=$this->_PublicationDao->uploadReport($Publication);

        return $Upload;
    }

    //delete publication report
    public function deleteReport($Publication){
        $Delete=$this->_PublicationDao->deleteReport($Publication);

        return $Delete;
    }

    //upload publication thumbnails
    public function uploadThumbnail($Publication){
        $Upload=$this->_PublicationDao->uploadThumbnail($Publication);

        return $Upload;
    }

    //delete publication thumbnail
    public function deleteThumbnail($Publication){
        $Delete=$this->_PublicationDao->deleteThumbnail($Publication);

        return $Delete;
    }

    //get All Publications
    public function getAllPublication(){

        $Result=$this->_PublicationDao->getAllPublication();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getAllPublication()");
        }

        return $Result;
    }

    //get All Years
    public function getAllYears(){
        $Result=$this->_PublicationDao->getAllYears();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getAllYears()");
        }

        return $Result;
    }

    //get All Terms
    public function getAllTerms(){
        $Result=$this->_PublicationDao->getAllTerms();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getAllTerms()");
        }

        return $Result;
    }

    //get All Courses
    public function getAllCourses(){
        $Result=$this->_PublicationDao->getAllCourses();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getAllCourses()");
        }

        return $Result;
    }

    //get All Disciplines
    public function getAllDisciplines(){
        $Result=$this->_PublicationDao->getAllDisciplines();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getAllDisciplines()");
        }

        return $Result;
    }

     //get All Teachers
    public function getAllTeachers(){
        $Result=$this->_PublicationDao->getAllTeachers();
        
        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getAllTeachers()");
        }
        return $Result;
    }

    //get specific year
    public function getYear($Year){
        $Result=$this->_PublicationDao->getYear($Year);
        
        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getYear($Year)");
        }
        return $Result;
    }

    //get specific Term
    public function getTerm($Term){
        $Result=$this->_PublicationDao->getTerm($Term);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getTerm($Term)");
        }
        return $Result;
    }

    //get specific course
    public function getCourse($Course){
        $Result=$this->_PublicationDao->getCourse($Course);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getCourse($Course)");
        }
        return $Result;
    }

    //get specific discipline
    public function getDiscipline($Discipline){
        $Result=$this->_PublicationDao->getDiscipline($Discipline);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getDiscipline($Discipline)");
        }
        return $Result;
    }

    //get specific teacher
    public function getTeacher($Teacher){
        $Result=$this->_PublicationDao->getTeacher($Teacher);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getTeacher($Teacher)");
        }
        return $Result;
    }

    //get specific publication
    public function getPublication($Publication){
        $Result=$this->_PublicationDao->getPublication($Publication);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.getPublication($Publication)");
        }
        return $Result;
    }
    
    //update previous publication
    public function updatePublication($Publication){
        $Result=$this->_PublicationDao->updatePublication($Publication);
        
        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.updatePublication($Publication)");
        }
        return $Result;
    }

    //delete specific publication
    public function deletePublication($Publication){
        $Result=$this->_PublicationDao->deletePublication($Publication);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationDao.deletePublication($Publication)");
        }
        return $Result;
    }

}
?>
