<?php
include_once UTILITY.'class.util.php';
include_once MODULE_ORGANISATION.'bao/class.organisationbao.php';

$_OrganisationBao=new OrganisationBao();
$_DB=DBUtil::getInstance();

/* saving a new organisation*/
if(isset($_POST['create']))
{
    if (!empty($_POST['name'])&&!empty($_POST['description'])&&!empty($_POST['motto'])){

        $Organisation=new Organisation();

        $Organisation->setOrganisationId(Util::getGUID());
        $Organisation->setOrganisationName($_DB->secureInput($_POST['name']));
        $Organisation->setOrganisationDescription($_DB->secureInput($_POST['description']));
        $Organisation->setOrganisationLink($_DB->secureInput($_POST['link_add']));
        $Organisation->setOrganisationMotto($_DB->secureInput($_POST['motto']));
        $Upload=$_OrganisationBao->uploadLogo($Organisation);

        //check if the logo has been uploaded
        if($Upload['uploaded']==1){
            $Organisation->setOrganisationLogo($_DB->secureInput($Upload['target_file']));
            $Result=$_OrganisationBao->createOrganisation($Organisation);

            if($Result->getIsSuccess()){
                echo '<strong>'.$Result->getResultObject().'</strong>';
                header("Location:".PageUtil::$ORGANISATION);
            }
        }
    }
}

/*Edit a organisation*/
if (isset($_GET['edit'])){
    $Organisation=new Organisation();

    $Organisation->setOrganisationId($_GET['edit']);
    $getRow=$_OrganisationBao->getOrganisation($Organisation)->getResultObject();
}

/*Update a organisation*/
if (isset($_POST['update'])){
    if (!empty($_POST['name'])&&!empty($_POST['description'])&&!empty($_POST['motto'])){

        $Organisation=new Organisation();

        $Organisation->setOrganisationId($_GET['edit']);
        $Organisation->setOrganisationName($_DB->secureInput($_POST['name']));
        $Organisation->setOrganisationDescription($_DB->secureInput($_POST['description']));
        $Organisation->setOrganisationLink($_DB->secureInput($_POST['link_add']));
        $Organisation->setOrganisationMotto($_DB->secureInput($_POST['motto']));
        $Upload=$_OrganisationBao->uploadLogo($Organisation);
        //check if the logo has been uploaded
        if($Upload['uploaded']==1){
            $Organisation->setOrganisationLogo($_DB->secureInput($Upload['target_file']));
            $Result=$_OrganisationBao->updateOrganisation($Organisation);

            if($Result->getIsSuccess()){
                echo '<strong>'.$Result->getResultObject().'</strong>';
                header("Location:".PageUtil::$ORGANISATION);
            }
        }
    }
}

/*Delete a organisation*/
if (isset($_GET['del'])){
    $Organisation=new Organisation();

    $Organisation->setOrganisationId($_GET['del']);
    ($_OrganisationBao->getOrganisation($Organisation)->getResultObject());
    $Delete=$_OrganisationBao->deleteLogo($_OrganisationBao->getOrganisation($Organisation)->getResultObject());
    if ($Delete){
        $Result=$_OrganisationBao->deleteOrganisation($Organisation);

        if ($Result->getIsSuccess()){
            echo '<strong>'.$Result->getResultObject().'</strong>';
            header("Location:".PageUtil::$ORGANISATION);
        }
    }else{
        echo 'Logo cannot be removed';
    }
}

?>
