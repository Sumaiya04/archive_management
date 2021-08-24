
<!--Publication Homepage-->
<?php
include_once UTILITY.'class.util.php';
include_once MODULE_PUBLICATION.'dao/class.publicationdao.php';
include_once MODULE_PUBLICATION.'dao/class.publicationHomedao.php';

class PublicationHomeBao{

    private $_PublicationHomeDao;

    public function __construct()
    {
        $this->_PublicationHomeDao=new PublicationHomeDao();
    }

    //get paginated publication
    public function getLimitPublication($page,$limit){
        $Result=$this->_PublicationHomeDao->getLimitPublication($page,$limit);

        if(!$Result->getIsSuccess()){
            $Result->setResultObject("Database failure in PublicationHomeDao.getLimitPublication($page,$limit)");
        }

        return $Result;
    }
}
?>
