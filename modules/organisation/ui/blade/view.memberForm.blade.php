<?php
include_once UTILITY.'class.util.php';
include_once MODULE_ORGANISATION.'bao/class.memberFormbao.php';

$_MemberBao=new MemberBao();
$_DB=DBUtil::getInstance();

/* saving a new member*/
if(isset($_POST['create']))
{
    if (!empty($_POST['name'])&&!empty($_POST['address'])&&!empty($_POST['post_id']) &&!empty($_POST['blood_id']) &&!empty($_POST['year_id'])&&!empty($_POST['discipline_id'])&&!empty($_POST['organisation_id'])&&!empty($_POST['contact'])){

        $Member=new Member();

        $Member->setMemberId(Util::getGUID());
        $Member->setMemberName($_DB->secureInput($_POST['name']));
        $Member->setMemberAddress($_DB->secureInput($_POST['address']));
        $Member->setMemberYearId($_POST['year_id']);
        $Member->setMemberBloodId($_POST['blood_id']);//blood
        $Member->setMemberPostId($_POST['post_id']);//post
        $Member->setMemberDisciplineId($_POST['discipline_id']);
        $Member->setMemberOrganisationId($_POST['organisation_id']);
        $Member->setMemberContact($_DB->secureInput($_POST['contact']));
        $Upload=$_MemberBao->uploadPhoto($Member);
        //check if the photo has been uploaded
        if( $Upload['uploaded']==1){
            $Member->setMemberPhoto($_DB->secureInput($Upload['target_file']));
            $Result=$_MemberBao->createMember($Member);

            if($Result->getIsSuccess()){
                echo '<strong>'.$Result->getResultObject().'</strong>';
                header("Location:".PageUtil::$ORGANISATION);
            }
        }
    }
}

/*Edit a member*/
if (isset($_GET['edit'])){
    $Member=new Member();

    $Member->setMemberId($_GET['edit']);
    $getRow=$_MemberBao->getMember($Member)->getResultObject();
}

/*Update a member*/
if (isset($_POST['update'])){
    if (!empty($_POST['name'])&&!empty($_POST['address'])&&!empty($_POST['post_id']) &&!empty($_POST['blood_id']) &&!empty($_POST['year_id'])&&!empty($_POST['discipline_id'])&&!empty($_POST['organisation_id'])&&!empty($_POST['contact'])){

        $Member=new Member();

        $Member->setMemberId($_GET['edit']);
        $Member->setMemberName($_DB->secureInput($_POST['name']));
        $Member->setMemberAddress($_DB->secureInput($_POST['address']));
        $Member->setMemberYearId($_POST['year_id']);
        $Member->setMemberBloodId($_POST['blood_id']);//blood
        $Member->setMemberPostId($_POST['post_id']);//post
        $Member->setMemberDisciplineId($_POST['discipline_id']);
        $Member->setMemberOrganisationId($_POST['organisation_id']);
        $Member->setMemberContact($_DB->secureInput($_POST['contact']));
        $Upload=$_MemberBao->uploadPhoto($Member);
        //check if the photo has been uploaded
        if( $Upload['uploaded']==1){
            $Member->setMemberPhoto($_DB->secureInput($Upload['target_file']));
            $Result=$_MemberBao->updateMember($Member);

            if($Result->getIsSuccess()){
                echo '<strong>'.$Result->getResultObject().'</strong>';
                header("Location:".PageUtil::$ORGANISATION);
            }
        }
    }
}

/*Delete a member*/
if (isset($_GET['del'])){
    $Member=new Member();

    $Member->setMemberId($_GET['del']);
    $Delete=$_MemberBao->deletePhoto($_MemberBao->getMember($Member)->getResultObject());
    if ($Delete){
        $Result=$_MemberBao->deleteMember($Member);

        if ($Result->getIsSuccess()){
            echo '<strong>'.$Result->getResultObject().'</strong>';
            header("Location:".PageUtil::$ORGANISATION);
        }
    }else{
        echo 'Photo cannot be removed';
    }
}

?>
