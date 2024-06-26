<?php
include_once UTILITY.'class.util.php';
include_once MODULE_PROJECT.'bao/class.projectbao.php';

$_ProjectBao=new ProjectBao();
$_DB=DBUtil::getInstance();

/* saving a new project*/
if(isset($_POST['create']))
{
    if (!empty($_POST['title'])&&!empty($_POST['description'])&&!empty($_POST['language'])
    &&!empty($_POST['year_id'])&&!empty($_POST['term_id'])&&!empty($_POST['course_id'])&&!empty($_POST['discipline_id'])
    &&!empty($_POST['teacher_id'])){

        $Project=new Project();

        $Project->setProjectId(Util::getGUID());
        $Project->setProjectTitle($_DB->secureInput($_POST['title']));
        $Project->setProjectDescription($_DB->secureInput($_POST['description']));
        $Project->setProjectLanguage($_DB->secureInput($_POST['language']));
        $Project->setProjectYearId($_POST['year_id']);
        $Project->setProjectTermId($_POST['term_id']);
        $Project->setProjectCourseId($_POST['course_id']);
        $Project->setProjectDisciplineId($_POST['discipline_id']);
        $Project->setProjectTeacherId($_POST['teacher_id']);

        if (!empty($_FILES['report']['name'])) {
            $UploadReport=$_ProjectBao->uploadReport($Project);
        }else{
            $UploadReport['uploaded']=1;
            $UploadReport['target_file']="";
        }

        $Upload=$_ProjectBao->uploadThumbnail($Project);
        //check if the thumbnail has been uploaded
        if($UploadReport['uploaded']==1 && $Upload['uploaded']==1){
            $Project->setProjectPDFLink($_DB->secureInput($UploadReport['target_file']));
            $Project->setProjectThumbnail($_DB->secureInput($Upload['target_file']));
            $Result=$_ProjectBao->createProject($Project);

            if($Result->getIsSuccess()){
                echo '<strong>'.$Result->getResultObject().'</strong>';
                header("Location:".PageUtil::$PROJECT);
            }
        }
    }
}

/*Edit a project*/
if (isset($_GET['edit'])){
    $Project=new Project();

    $Project->setProjectId($_GET['edit']);
    $getRow=$_ProjectBao->getProject($Project)->getResultObject();
}

/*Update a project*/
if (isset($_POST['update'])){
    if (!empty($_POST['title'])&&!empty($_POST['description'])&&!empty($_POST['language'])
        &&!empty($_POST['year_id'])&&!empty($_POST['term_id'])&&!empty($_POST['course_id'])&&!empty($_POST['discipline_id'])
        &&!empty($_POST['teacher_id'])){

        $Project=new Project();

        $Project->setProjectId($_GET['edit']);
        $Project->setProjectTitle($_DB->secureInput($_POST['title']));
        $Project->setProjectDescription($_DB->secureInput($_POST['description']));
        $Project->setProjectLanguage($_DB->secureInput($_POST['language']));
        $Project->setProjectYearId($_POST['year_id']);
        $Project->setProjectTermId($_POST['term_id']);
        $Project->setProjectCourseId($_POST['course_id']);
        $Project->setProjectDisciplineId($_POST['discipline_id']);
        $Project->setProjectTeacherId($_POST['teacher_id']);

        $UploadReport=$_ProjectBao->uploadReport($Project);
        $Upload=$_ProjectBao->uploadThumbnail($Project);
        //check if the thumbnail has been uploaded
        if($UploadReport['uploaded']==1 && $Upload['uploaded']==1){
            $Project->setProjectPDFLink($_DB->secureInput($UploadReport['target_file']));
            $Project->setProjectThumbnail($_DB->secureInput($Upload['target_file']));
            $Result=$_ProjectBao->updateProject($Project);

            if($Result->getIsSuccess()){
                echo '<strong>'.$Result->getResultObject().'</strong>';
                header("Location:".PageUtil::$PROJECT);
            }
        }
    }
}

/*Delete a project*/
if (isset($_GET['del'])){
    $Project=new Project();

    $Project->setProjectId($_GET['del']);
     $DeleteReport=$_ProjectBao->deleteReport($_ProjectBao->getProject($Project)->getResultObject());
    $Delete=$_ProjectBao->deleteThumbnail($_ProjectBao->getProject($Project)->getResultObject());
    if ($Delete){
        $Result=$_ProjectBao->deleteProject($Project);

        if ($Result->getIsSuccess()){
            echo '<strong>'.$Result->getResultObject().'</strong>';
            header("Location:".PageUtil::$PROJECT);
        }
    }else{
        echo 'Thumbnail cannot be removed';
    }
}

?>
