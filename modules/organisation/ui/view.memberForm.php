<?php
include_once 'blade/view.memberForm.blade.php';
include_once COMMON.'class.common.php';
?>

<div class="container">
    <!--Heading-->
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default myPanel">
        <div class="panel-heading myHeading">
            <strong><img src="./resources/img/createproject.png" alt="Icon" class="myImg">&nbsp;Membership Form</strong>
        </div>
        <div class="panel-body">

            <!--Member Creation Form-->
            <form method="post" class="form-horizontal" enctype="multipart/form-data">

                <!--            Name-->
                <div class="form-group">
                    <label for="name" class="control-label col-md-3">Name :</label>
                    <div class=" col-md-7">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Member Name" value="<?php
                        if (isset($_GET['edit'])) echo $getRow->getMemberName();
                        elseif (isset($_POST['create'])) echo $_POST['name'];
                        ?>" required>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['name'])) echo '*Name is required';?></span>
                    </div>
                </div>


                <!--            YearDDL-->
                <div class="form-group">
                    <label for="year_id" class="control-label col-md-3">Year :</label>
                    <div class="col-md-7">
                        <select name="year_id" id="year_id" class="form-control" required>
                            <option value="" selected="selected" disabled>Select Year</option>
                            <?php
                            $Result=$_MemberBao->getAllYears();
                            if($Result->getIsSuccess()){
                                $YearList=$Result->getResultObject();
                                foreach ($YearList as $year){
                                    ?>
                                    <option value="<?php echo $year->getYearId();?>" <?php
                                    if (isset($_GET['edit'])&& $year->getYearId()==$getRow->getMemberYearId()) echo 'selected="selected"';
                                    elseif (isset($_POST['create'])&&!empty($_POST['year_id'])&&$year->getYearId()==$_POST['year_id']) echo 'selected="selected"'
                                    ?>><?php echo $year->getYearName();?></option>
                                    <?php
                                }
                            }else{
                                echo $Result->getResultObject();
                            }
                            ?>
                        </select>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['year_id'])) echo '*Year is required';?></span>
                    </div>
                </div>



                <!--            DisciplineDDL-->
                <div class="form-group">
                    <label for="discipline_id" class="control-label col-md-3">Discipline :</label>
                    <div class="col-md-7">
                        <select name="discipline_id" id="discipline_id" class="form-control" required>
                            <option value="" selected="selected" disabled>Select Discipline</option>
                            <?php
                            $Result=$_MemberBao->getAllDisciplines();
                            if($Result->getIsSuccess()){
                                $DisciplineList=$Result->getResultObject();
                                foreach ($DisciplineList as $discipline){
                                    ?>
                                    <option value="<?php echo $discipline->getDisciplineId();?>"<?php
                                    if (isset($_GET['edit'])&&$discipline->getDisciplineId()==$getRow->getMemberDisciplineId()) echo 'selected="selected"';
                                    elseif (isset($_POST['create'])&&!empty($_POST['discipline_id'])&&$discipline->getDisciplineId()==$_POST['discipline_id']) echo 'selected="selected"';
                                    ?>><?php echo $discipline->getDisciplineName();?></option>
                                    <?php
                                }
                            }
                            else{
                                echo $Result->getResultObject();
                            }
                            ?>
                        </select>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['discipline_id'])) echo '*Discipline is required';?></span>
                    </div>
                </div>

                 <!--            Organisation name-->
                <div class="form-group">
                    <label for="organisation_id" class="control-label col-md-3">Member of :</label>
                    <div class="col-md-7">
                        <select name="organisation_id" id="organisation_id" class="form-control" required>
                            <option value="" selected="selected" disabled>Select Organisation</option>
                            <?php
                            $Result=$_MemberBao->getAllOrganisations();
                            if($Result->getIsSuccess()){
                                $OrganisationList=$Result->getResultObject();
                                foreach ($OrganisationList as $organisation){
                                    ?>
                                    <option value="<?php echo $organisation->getOrganisationId();?>"<?php
                                    if (isset($_GET['edit'])&&$organisation->getOrganisationId()==$getRow->getMemberOrganisationId()) echo 'selected="selected"';
                                    elseif (isset($_POST['create'])&&!empty($_POST['organisation_id'])&&$organisation->getOrganisationId()==$_POST['organisation_id']) echo 'selected="selected"';
                                    ?>><?php echo $organisation->getOrganisationName();?></option>
                                    <?php
                                }
                            }
                            else{
                                echo $Result->getResultObject();
                            }
                            ?>
                        </select>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['organisation_id'])) echo '*Organisation is required';?></span>
                    </div>
                </div>

                 <!--            Blood Group-->
                 <div class="form-group">
                    <label for="blood_id" class="control-label col-md-3">Blood Group :</label>
                    <div class="col-md-7">
                        <select name="blood_id" id="blood_id" class="form-control" required>
                            <option value="" selected="selected" disabled>Select Blood</option>
                            <?php
                            $Result=$_MemberBao->getAllBloods();
                            if($Result->getIsSuccess()){
                                $BloodList=$Result->getResultObject();
                                foreach ($BloodList as $blood){
                                    ?>
                                    <option value="<?php echo $blood->getBloodId();?>" <?php
                                    if (isset($_GET['edit'])&& $blood->getBloodId()==$getRow->getMemberBloodId()) echo 'selected="selected"';
                                    elseif (isset($_POST['create'])&&!empty($_POST['blood_id'])&&$blood->getBloodId()==$_POST['blood_id']) echo 'selected="selected"'
                                    ?>><?php echo $blood->getBloodName();?></option>
                                    <?php
                                }
                            }else{
                                echo $Result->getResultObject();
                            }
                            ?>
                        </select>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['blood_id'])) echo '*Blood group is required';?></span>
                    </div>
                </div>

                 <!--       Post -->
                 <div class="form-group">
                    <label for="post_id" class="control-label col-md-3">Post :</label>
                    <div class="col-md-7">
                        <select name="post_id" id="post_id" class="form-control" required>
                            <option value="" selected="selected" disabled>Select Post</option>
                            <?php
                            echo "hii";
                            $Result=$_MemberBao->getAllPosts();
                            if($Result->getIsSuccess()){
                                $PostList=$Result->getResultObject();
                                foreach ($PostList as $post){
                                    ?>
                                    <option value="<?php echo $post->getPostId();?>" <?php
                                    if (isset($_GET['edit'])&& $post->getPostId()==$getRow->getMemberPostId()) echo 'selected="selected"';
                                    elseif (isset($_POST['create'])&&!empty($_POST['post_id'])&&$post->getPostId()==$_POST['post_id']) echo 'selected="selected"'
                                    ?>><?php echo $post->getPostName();?></option>
                                    <?php
                                }
                            }else{
                                echo $Result->getResultObject();
                            }
                            ?>
                        </select>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['post_id'])) echo '*Post is required';?></span>
                    </div>
                </div>


                <!--           Address-->
                <div class="form-group">
                    <label for="address" class="control-label col-md-3">Address :</label>
                    <div class=" col-md-7">
                        <textarea name="address" id="address" rows="7" class="form-control" required><?php
                            if (isset($_GET['edit'])) echo $getRow->getMemberAddress();
                            elseif (isset($_POST['create'])&&!empty($_POST['address'])) echo $_POST['address'];
                            ?></textarea>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['address'])) echo '*Address is required';?></span>
                    </div>
                </div>

                 <!--            Contact-->
                 <div class="form-group">
                    <label for="contact" class="control-label col-md-3">Contact :</label>
                    <div class=" col-md-7">
                        <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact No" value="<?php
                        if (isset($_GET['edit'])) echo $getRow->getMemberContact();
                        elseif (isset($_POST['create'])) echo $_POST['contact'];
                        ?>" required>
                        <span style="color: darkred"><?php if (isset($_POST['create'])&&empty($_POST['contact'])) echo '*Contact No is required';?></span>
                    </div>
                </div>

                <!--photo Src-->
                <div class="form-group">
                    <div class="col-md-7">
                        <input type="hidden" name="photosrc" id="photosrc" class="form-control" value="<?php
                        if(isset($_GET['edit'])) echo $getRow->getMemberPhoto();
                        ?>">
                    </div>
                </div>

                <!--Photo-->
                <div class="form-group">
                    <label for="photo" class="control-label col-md-3">Photo :</label>
                    <div class="col-md-4">
                        <input type="file" name="photo" onchange="previewImage(this);" id="photo"<?php if (!isset($_GET['edit'])) echo 'required';?>>
                    </div>
                    <div class="col-md-1 photo" id="divPreview" <?php if(!isset($_GET['edit'])) echo 'style="display: none"'; ?>>
                        <img id="preview" src="<?php
                        if (isset($_GET['edit'])) echo $getRow->getMemberPhoto();
                        elseif (isset($_POST['create'])) echo $_POST['photo'];
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
<!--Display all members-->
<div class="col-md-12">
    <hr>
</div>
<div class="col-md-12">
    <div class="panel panel-table">
        <table class="table table-striped table-bordered table-responsive">
            <!--Header Row-->
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Year</th>
                <th>Discipline</th>
                <th>Member of</th>
                <th>Blood Group</th>
                <th>Post</th>
                <th>Address</th>
                <th>Contact No</th>
                <th><img src="./resources/img/edit.ico" alt="Edit" class="table-img"></th>
                <th><img src="./resources/img/delete.png" alt="Delete" class="table-img"></th>
            </tr>

            <!--Table Cells-->
            <?php
            $Result=$_MemberBao->getAllMembers();
            if($Result->getIsSuccess()){
                $MemberList=$Result->getResultObject();

                foreach ($MemberList as $member) {
                    ?>
                    <tr>
                        <td><a href="member_form.php?id=<?php echo $member->getMemberId();?>"><img src="<?php echo $member->getMemberPhoto();?>" alt="Icon" class="table-img"></a></td>
                        <td>
                        <?php
                                echo ' '.$member->getMemberName(); ?></td>

                        <td class="table-cell"><?php echo $Result=$_MemberBao->getYear($member->getMemberYearId())->getResultObject()->getYearName();?></td>

                        <td><?php echo $Result=$_MemberBao->getDiscipline($member->getMemberDisciplineId())->getResultObject()->getDisciplineName();?></td>

                        <td><?php echo $Result=$_MemberBao->getOrganisation($member->getMemberOrganisationId())->getResultObject()->getOrganisationName();?></td>

                        <td class="table-cell"><?php echo $Result=$_MemberBao->getBlood($member->getMemberBloodId())->getResultObject()->getBloodName();?></td>

                        <td class="table-cell"><?php echo $Result=$_MemberBao->getPost($member->getMemberPostId())->getResultObject()->getPostName();?></td>

                        <td><?php if(strlen($member->getMemberAddress())>50){
                                echo substr($member->getMemberAddress(),0,50).'...';
                            }else{
                                echo $member->getMemberAddress();
                            }  ?></td>
                             <td><?php echo $member->getMemberContact(); ?></td>

                        <td class="table-cell"><a href="?edit=<?php echo $member->getMemberId();?>" onclick="return confirm('sure to edit !');">edit</a></td>

                        <td class="table-cell"><a href="?del=<?php echo $member->getMemberId();?>" class="span-danger" onclick="return confirm('sure to delete !');">delete</a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>