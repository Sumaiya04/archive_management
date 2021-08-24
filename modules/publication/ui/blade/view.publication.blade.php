<?php
include_once UTILITY.'class.util.php';
include_once MODULE_PUBLICATION.'bao/class.publicationbao.php';

$_PublicationBao=new PublicationBao();
$_DB=DBUtil::getInstance();

/* saving a new publication*/
if(isset($_POST['create']))
{
    if (!empty($_POST['title'])&&!empty($_POST['description'])&&!empty($_POST['year_id'])
        &&!empty($_POST['term_id'])&&!empty($_POST['course_id'])&&!empty($_POST['discipline_id'])){

        $Publication=new Publication();

        $Publication->setPublicationId(Util::getGUID());
        $Publication->setPublicationTitle($_DB->secureInput($_POST['title']));
        $Publication->setPublicationDescription($_DB->secureInput($_POST['description']));
        $Publication->setPublicationYearId($_POST['year_id']);
        $Publication->setPublicationTermId($_POST['term_id']);
        $Publication->setPublicationCourseId($_POST['course_id']);
        $Publication->setPublicationDisciplineId($_POST['discipline_id']);
        if (!empty($_FILES['report']['name'])) {
            $UploadReport=$_PublicationBao->uploadReport($Publication);
        }else{
            $UploadReport['uploaded']=1;
            $UploadReport['target_file']="";
        }
        $UploadThumbnail=$_PublicationBao->uploadThumbnail($Publication);
        //check if the thumbnail has been uploaded
        if($UploadReport['uploaded']==1 && $UploadThumbnail['uploaded']==1){
            $Publication->setPublicationPDFLink($_DB->secureInput($UploadReport['target_file']));
            $Publication->setPublicationThumbnail($_DB->secureInput($UploadThumbnail['target_file']));
            $Result=$_PublicationBao->createPublication($Publication);

            if($Result->getIsSuccess()){
                echo '<strong>'.$Result->getResultObject().'</strong>';
                header("Location:".PageUtil::$PUBLICATION);
            }
        }
    }
}

/*Edit a publication*/
if (isset($_GET['edit'])){
    $Publication=new Publication();

    $Publication->setPublicationId($_GET['edit']);
    $getRow=$_PublicationBao->getPublication($Publication)->getResultObject();
}

/*Update a publication*/
if (isset($_POST['update'])){
    if (!empty($_POST['title'])&&!empty($_POST['description'])&&!empty($_POST['year_id'])
        &&!empty($_POST['term_id'])&&!empty($_POST['course_id'])&&!empty($_POST['discipline_id'])){

        $Publication=new Publication();

        $Publication->setPublicationId($_GET['edit']);
        $Publication->setPublicationTitle($_DB->secureInput($_POST['title']));
        $Publication->setPublicationDescription($_DB->secureInput($_POST['description']));
        $Publication->setPublicationYearId($_POST['year_id']);
        $Publication->setPublicationTermId($_POST['term_id']);
        $Publication->setPublicationCourseId($_POST['course_id']);
        $Publication->setPublicationDisciplineId($_POST['discipline_id']);
        $UploadReport=$_PublicationBao->uploadReport($Publication);
        $UploadThumbnail=$_PublicationBao->uploadThumbnail($Publication);
        //check if the thumbnail has been uploaded
        if($UploadReport['uploaded']==1 && $UploadThumbnail['uploaded']==1){
            $Publication->setPublicationPDFLink($_DB->secureInput($UploadReport['target_file']));
            $Publication->setPublicationThumbnail($_DB->secureInput($UploadThumbnail['target_file']));
            $Result=$_PublicationBao->updatePublication($Publication);

            if($Result->getIsSuccess()){
                echo '<strong>'.$Result->getResultObject().'</strong>';
                header("Location:".PageUtil::$PUBLICATION);
            }
        }
    }
}

/*Delete a publication*/
if (isset($_GET['del'])){
    $Publication=new Publication();

    $Publication->setPublicationId($_GET['del']);
    $DeleteReport=$_PublicationBao->deleteReport($_PublicationBao->getPublication($Publication)->getResultObject());
    $DeleteThumbnail=$_PublicationBao->deleteThumbnail($_PublicationBao->getPublication($Publication)->getResultObject());
    if ($DeleteReport && $DeleteThumbnail){   
        $Result=$_PublicationBao->deletePublication($Publication);

        if ($Result->getIsSuccess()){
            echo '<strong>'.$Result->getResultObject().'</strong>';
            header("Location:".PageUtil::$PUBLICATION);
        }
    }else{
        echo 'Thumbnail cannot be removed';
    }
}

?>
