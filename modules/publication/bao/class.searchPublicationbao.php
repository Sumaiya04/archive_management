<!--Search specific publication-->
<?php
include_once UTILITY.'class.util.php';
include_once MODULE_PUBLICATION.'dao/class.searchPublicationdao.php';

/*
	User Business Object
*/
Class SearchPublicationBao
{

    private $_SearchPublicationDao;

    public function __construct()
    {
        $this->_SearchPublicationDao=new SearchPublicationDao();
    }   

    //get searched publication
    public function getSearchedPublication(){
        $Result=$this->_SearchPublicationDao->getSearchedPublication();

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in SearchPublicationDao.getSearchedPublication()");
        }
        return $Result;
    }
    
    //get all students
    public function getAllStudents(){
        $Result=$this->_SearchPublicationDao->getAllStudents();
        
        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in SearchPublicationDao.getAllStudents()");
        }
        return $Result;
    }   
    
}
?>
