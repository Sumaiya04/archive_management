<?php
include_once UTILITY.'class.util.php';
include_once MODULE_PUBLICATION.'bao/class.publicationMemberbao.php';
include_once MODULE_PUBLICATION.'bao/class.publicationbao.php';

$_PublicationBao=new PublicationBao();
$Publication=new Publication();
$_MemberBao=new PublicationMemberBao();
$_DB=DBUtil::getInstance();

/*Add Links*/
if(isset($_GET['id'])&&isset($_POST['add'])){
    $LinkPublication=new LinkPublication();
    $LinkPublication->setLinkPublicationId(Util::getGUID());
    $LinkPublication->setPublicationId($_GET['id']);
    $LinkPublication->setLink($_DB->secureInput($_POST['link_add']));

    $Result=$_MemberBao->addLink($LinkPublication);

    if($Result->getIsSuccess()){
        echo '<strong>'.$Result->getResultObject().'</strong>';
        header("Location:".PageUtil::$PUBLICATION_MEMBER."?id=".$_GET['id']);
    }
}

/*Add Members*/
if(isset($_GET['auid'])&&isset($_GET['id'])){
    $StudentPublication=new StudentPublication();
    $StudentPublication->setStudentPublicationId(Util::getGUID());
    $StudentPublication->setPublicationId($_GET['id']);
    $StudentPublication->setStudentId($_GET['auid']);
    $StudentPublication->setContribution($_DB->secureInput(0));

    $Result=$_MemberBao->addMember($StudentPublication);

    if($Result->getIsSuccess()){
        echo '<strong>'.$Result->getResultObject().'</strong>';
        header("Location:".PageUtil::$PUBLICATION_MEMBER."?id=".$_GET['id']);
    }
}

/*Add Supervisors*/
if(isset($_GET['auid2'])&&isset($_GET['id'])){
    $SupervisorPublication=new SupervisorPublication();
    $SupervisorPublication->setSupervisorPublicationId(Util::getGUID());
    $SupervisorPublication->setPublicationId($_GET['id']);
    $SupervisorPublication->setSupervisorId($_GET['auid2']);

    $Result=$_MemberBao->addSupervisor($SupervisorPublication);

    if($Result->getIsSuccess()){
        echo '<strong>'.$Result->getResultObject().'</strong>';
        header("Location:".PageUtil::$PUBLICATION_MEMBER."?id=".$_GET['id']);
    }
}

/*Remove Links*/
if(isset($_GET['rlid'])&&isset($_GET['id'])){
    $LinkPublication=new LinkPublication();
    $LinkPublication->setPublicationId($_GET['id']);
    $LinkPublication->setLinkPublicationId($_GET['rlid']);

    $Result=$_MemberBao->removeLink($LinkPublication);

    if($Result->getIsSuccess()){
        echo '<strong>'.$Result->getResultObject().'</strong>';
        header("Location:".PageUtil::$PUBLICATION_MEMBER."?id=".$_GET['id']);
    }
}

/*Remove Members*/
if(isset($_GET['ruid'])&&isset($_GET['id'])){
    $StudentPublication=new StudentPublication();
    $StudentPublication->setPublicationId($_GET['id']);
    $StudentPublication->setStudentId($_GET['ruid']);

    $Result=$_MemberBao->removeMember($StudentPublication);

    if($Result->getIsSuccess()){
        echo '<strong>'.$Result->getResultObject().'</strong>';
        header("Location:".PageUtil::$PUBLICATION_MEMBER."?id=".$_GET['id']);
    }
}

/*Remove Supervisors*/
if(isset($_GET['ruid2'])&&isset($_GET['id'])){
    $SupervisorPublication=new SupervisorPublication();
    $SupervisorPublication->setPublicationId($_GET['id']);
    $SupervisorPublication->setSupervisorId($_GET['ruid2']);

    $Result=$_MemberBao->removeSupervisor($SupervisorPublication);

    if($Result->getIsSuccess()){
        echo '<strong>'.$Result->getResultObject().'</strong>';
        header("Location:".PageUtil::$PUBLICATION_MEMBER."?id=".$_GET['id']);
    }
}

?>
