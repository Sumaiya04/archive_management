<?php
include_once 'blade/view.organisation.blade.php';
include_once COMMON.'class.common.php';
?>

<div class="container">
    <!--Heading-->
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default myPanel">
        <div class="panel-heading myHeading">
            <strong><img src="./resources/img/createproject.png" alt="Icon" class="myImg">&nbsp;Create Organisation</strong>
        </div>
        <div class="panel-body">

            <!--Organisation Creation Form-->
            <form method="post" class="form-horizontal" enctype="multipart/form-data">

                <!-- Name-->
                <div class="form-group">
                    <label for="name" class="control-label col-md-3">Name :</label>
                    <div class=" col-md-7">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Organisation Name" value="<?php
                        if (isset($_GET['edit'])) echo $getRow->getOrganisationName();
                        elseif (isset($_POST['create'])) echo $_POST['name'];
                        ?>" required>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['name'])) echo '*Name is required';?></span>
                    </div>
                </div>

                                <!-- Description-->
                 <div class="form-group">
                    <label for="description" class="control-label col-md-3">Description :</label>
                    <div class=" col-md-7">
                        <textarea name="description" id="description" rows="7" class="form-control" required><?php
                            if (isset($_GET['edit'])) echo $getRow->getOrganisationDescription();
                            elseif (isset($_POST['create'])&&!empty($_POST['description'])) echo $_POST['description'];
                            ?></textarea>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['description'])) echo '*Description is required';?></span>
                    </div>
                </div>

                    <!--Add Link-->

                        <div class="form-group">
                            <label for="link_add" class="control-label col-md-3 text-info">Add Link :</label>
                            <div class="col-md-6">
                                <input type="url" name="link_add" id="link_add" class="form-control alert-info" placeholder="Link..." 
                                value="<?php
                                if (isset($_GET['edit'])) echo $getRow->getOrganisationLink();
                        elseif (isset($_POST['create'])) echo $_POST['link_add'];
                        ?>" >
                            </div>
                        </div>
                    

                 <!--Motto-->

                  <!-- Motto-->
                <div class="form-group">
                    <label for="motto" class="control-label col-md-3">Motto :</label>
                    <div class=" col-md-7">
                        <input type="text" name="motto" id="motto" class="form-control" placeholder="Organisation Motto" value="<?php
                        if (isset($_GET['edit'])) echo $getRow->getOrganisationMotto();
                        elseif (isset($_POST['create'])) echo $_POST['motto'];
                        ?>" required>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['motto'])) echo '*Motto is required';?></span>
                    </div>
                </div>



                <!--Logo Src-->
                <div class="form-group">
                    <div class="col-md-7">
                        <input type="hidden" name="logosrc" id="logosrc" class="form-control" value="<?php
                        if(isset($_GET['edit'])) echo $getRow->getOrganisationLogo();
                        ?>">
                    </div>
                </div>

                <!--Logo-->
                <div class="form-group">
                    <label for="logo" class="control-label col-md-3">Logo :</label>
                    <div class="col-md-4">
                        <input type="file" name="logo" onchange="previewImage(this);" id="logo"<?php if (!isset($_GET['edit'])) echo 'required';?>>
                    </div>
                    <div class="col-md-1 logo" id="divPreview" <?php if(!isset($_GET['edit'])) echo 'style="display: none"'; ?>>
                        <img id="preview" src="<?php
                        if (isset($_GET['edit'])) echo $getRow->getOrganisationLogo();
                        elseif (isset($_POST['create'])) echo $_POST['logo'];
                        ?>">
                    </div>
                        
                    
                </div>

                <br>

                <!--Button-->
                <div class="form-group">
                    <?php
                    if (!isset($_GET['edit'])){
                        ?>
                        <input type="submit" class="btn btn-primary col-md-2 col-md-offset-5" name="create" value="Create">
                    <?php
                    }else{
                        ?>
                        <input type="submit" class="btn btn-primary col-md-2 col-md-offset-5" name="update" value="Update">
                    <?php
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<!--Display all organisations-->
<div class="col-md-12">
    <hr>
</div>
<div class="col-md-12">
    <div class="panel panel-table">
        <table class="table table-striped table-bordered table-responsive">
            <!--Header Row-->
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Link</th>
                <th>Motto</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th><img src="./resources/img/edit.ico" alt="Edit" class="table-img"></th>
                <th><img src="./resources/img/delete.png" alt="Delete" class="table-img"></th>
            </tr>

            <!--Table Cells-->
            <?php
            $Result=$_OrganisationBao->getAllOrganisations();
            if($Result->getIsSuccess()){
                $OrganisationList=$Result->getResultObject();

                foreach ($OrganisationList as $organisation) {
                    ?>
                    <tr>
                        <td><a href="organisation_member.php?id=<?php echo $organisation->getOrganisationId();?>"><img src="<?php echo $organisation->getOrganisationLogo();?>" alt="Icon" class="table-img"><?php
                                echo ' '.$organisation->getOrganisationName(); ?></a></td>

                        <td><?php if(strlen($organisation->getOrganisationDescription())>50){
                                echo substr($organisation->getOrganisationDescription(),0,50).'...';
                            }else{
                                echo $organisation->getOrganisationDescription();
                            }  ?></td>

                             <td class="table-cell" <?php if (empty($organisation->getOrganisationLink())) {
                            echo 'class="text-danger"';
                        } ?>>
                        <?php
                        if (!empty($organisation->getOrganisationLink())) {
                            ?>
                            <a href="<?php echo $organisation->getOrganisationLink(); ?>" style="text-decoration: none"><?php
                                if(strlen($organisation->getOrganisationName())>40){
                                    echo substr($organisation->getOrganisationName(),0,40).'...';
                                }else{
                                    echo $organisation->getOrganisationLink();
                                } ?></a>
                            <?php
                        }else{
                            echo "No Link Available";
                        }
                        ?>
                        </td>

                        <td><?php if(strlen($organisation->getOrganisationMotto())>50){
                                echo substr($organisation->getOrganisationMotto(),0,50).'...';
                            }else{
                                echo $organisation->getOrganisationMotto();
                            }  ?></td>

                        <td class="table-cell"><?php echo $organisation->getOrganisationCreatedAt();?></td>

                        <td class="table-cell"><?php echo $organisation->getOrganisationUpdatedAt();?></td>

                        <td class="table-cell"><a href="?edit=<?php echo $organisation->getOrganisationId();?>" onclick="return confirm('sure to edit !');">edit</a></td>

                        <td class="table-cell"><a href="?del=<?php echo $organisation->getOrganisationId();?>" class="span-danger" onclick="return confirm('sure to delete !');">delete</a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>