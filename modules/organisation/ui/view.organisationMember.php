<?php
include_once 'blade/view.organisationMember.blade.php';
include_once COMMON.'class.common.organisation.php';
include_once COMMON.'class.common.php';
?>

<div class="container">
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default myPanel">
        <div class="panel-heading myHeading" style="margin-bottom: 0vh">
            <strong><img src="<?php
                $Organisation->setOrganisationId($_GET['id']);
                $Result=$_OrganisationBao->getOrganisation($Organisation)->getResultObject();
                echo $Result->getOrganisationLogo();?>" alt="Icon" class="myImg">&nbsp;<?php
                echo $Result->getOrganisationName()?></strong>
        </div>
        <div class="panel-body">
            <div class="form-horizontal">

                <!--Hidden Id-->
                <div class="form-group">
                    <div class=" col-md-7">
                        <input type="hidden" name="pid" id="pid" class="form-control" value="<?php
                        echo $Result->getOrganisationId(); ?>">
                    </div>
                </div>

                <!--Short Description-->
                <div id="shortDescription" class="form-group">
                    <label for="description" class="control-label col-md-3">Description :</label>
                    <div id="description" class=" control-label col-md-8 text-justify">
                        <?php
                        if(strlen($Result->getOrganisationDescription())>250){
                            echo substr($Result->getOrganisationDescription(),0,250).'...'.'<a href="#" onclick="rmFunction();">Read more</a>';
                        }
                        else{
                            echo $Result->getOrganisationDescription();
                        }
                        ?>
                    </div>
                </div>

                <!--Long Description-->
                <div id="longDescription" class="form-group" style="display: none">
                    <label for="description" class="control-label col-md-3">Description :</label>
                    <div id="description" class=" control-label col-md-8 text-justify">
                        <?php
                        echo $Result->getOrganisationDescription();
                        ?>
                    </div>
                </div>

                <!--Link(s)-->
                <div class="form-group">
                    <label for="link_add" class="control-label col-md-3">Link :</label>
                    <div id="link_add" class="control-label col-md-8 text-justify">
                        <?php
                        if (!empty($Result->getOrganisationLink())) {
                            ?>
                            <a href="<?php echo $Result->getOrganisationLink(); ?>" style="text-decoration: none"><?php
                             if(strlen($Result->getOrganisationName())>40){
                                echo substr($organisation->getOrganisationName(),0,40).'...';
                            }else{
                                echo $Result->getOrganisationLink();
                            } ?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                    <!-- motto-->
                    <div class="form-group">
                    <label for="motto" class="control-label col-md-3"> Our Motto :</label>
                    <div id="motto" class=" control-label col-md-8 text-justify">
                        <?php
                        if(strlen($Result->getOrganisationMotto())>250){
                            echo substr($Result->getOrganisationMotto(),0,250).'...'.'<a href="#" onclick="rmFunction();">Read more</a>';
                        }
                        else{
                            echo $Result->getOrganisationMotto();
                        }
                        ?>
                    </div>
                    
                        <br>
                        <br>

                    <!-- add member button -->

                <a href="member_form.php" class="btn btn-primary col-md-2 col-md-offset-5" role="button">Add Member</a>
                </div>
           
                </div>
            </div>
            </div>
        </div>
    </div>         
</div>
