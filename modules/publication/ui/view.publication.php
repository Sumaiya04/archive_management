<?php
include_once 'blade/view.publication.blade.php';
include_once COMMON.'class.common.php';
include_once UTILITY.'class.util.php';
?>


<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <!--Heading-->
        <div class="panel panel-default myPanel">
            <div class="panel-heading myHeading">
                <strong><img src="./resources/img/createproject.png" alt="Icon" class="myImg">&nbsp;Create Publication</strong>
            </div>
            <div class="panel-body">

                <!--Publication Creation Form-->
                <form method="post" class="form-horizontal" enctype="multipart/form-data">

                    <!--            Title-->
                    <div class="form-group">
                        <label for="title" class="control-label col-md-3">Title :</label>
                        <div class=" col-md-7">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Publication Title" value="<?php
                            if (isset($_GET['edit'])) echo $getRow->getPublicationTitle();
                            elseif (isset($_POST['create'])) echo $_POST['title'];
                            ?>" required>
                            <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['title'])) echo '*Title is required';?></span>
                        </div>
                    </div>

                    <!--            YearDDL-->
                    <div class="form-group">
                        <label for="year_id" class="control-label col-md-3">Year :</label>
                        <div class="col-md-7">
                            <select name="year_id" id="year_id" class="form-control" required>
                                <option value="" selected="selected" disabled>Select Year</option>
                                <?php
                                $Result=$_PublicationBao->getAllYears();
                                if($Result->getIsSuccess()){
                                    $YearList=$Result->getResultObject();
                                    foreach ($YearList as $year){
                                        ?>
                                        <option value="<?php echo $year->getYearId();?>" <?php
                                        if (isset($_GET['edit'])&& $year->getYearId()==$getRow->getPublicationYearId()) echo 'selected="selected"';
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

                    <!--            TermDDL-->
                    <div class="form-group">
                        <label for="term_id" class="control-label col-md-3">Term :</label>
                        <div class="col-md-7">
                            <select name="term_id" id="term_id" class="form-control" required>
                                <option value="" selected="selected" disabled>Select Term</option>
                                <?php
                                $Result=$_PublicationBao->getAllTerms();
                                if($Result->getIsSuccess()) {
                                    $TermList = $Result->getResultObject();
                                    foreach ($TermList as $term){
                                        ?>
                                        <option value="<?php echo $term->getTermId();?>" <?php
                                        if (isset($_GET['edit'])&&$term->getTermId()==$getRow->getPublicationTermId()) echo 'selected="selected"';
                                        elseif (isset($_POST['create'])&&!empty($_POST['term_id'])&&$term->getTermId()==$_POST['term_id'])echo 'selected="selected"';
                                        ?>><?php echo $term->getTermName();?></option>
                                        <?php
                                    }
                                }else{
                                    echo $Result->getResultObject();
                                }
                                ?>
                            </select>
                            <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['term_id'])) echo '*Term is required';?></span>
                        </div>
                    </div>

                    <!--            CourseDDL-->
                    <div class="form-group">
                        <label for="course_id" class="control-label col-md-3">Course No :</label>
                        <div class="col-md-7">
                            <select name="course_id" id="course_id" class="form-control" onchange="jsFunction(this.value);" required>
                                <option value="" selected="selected" disabled>Select Course</option>
                                <?php
                                $Result=$_PublicationBao->getAllCourses();
                                if($Result->getIsSuccess()){
                                    $CourseList=$Result->getResultObject();
                                    foreach ($CourseList as $course){
                                        ?>
                                        <option value="<?php echo $course->getCourseId();?>" <?php
                                        if (isset($_GET['edit'])&&$course->getCourseId()==$getRow->getPublicationCourseId()) echo 'selected="selected"';
                                        elseif (isset($_POST['create'])&&!empty($_POST['course_id'])&&$course->getCourseId()==$_POST['course_id']) echo 'selected="selected"';
                                        ?>><?php echo $course->getCourseNo();?></option>
                                        <?php
                                    }
                                }else{
                                    echo $Result->getResultObject();
                                }
                                ?>
                            </select>
                            <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['course_id'])) echo '*Course is required';?></span>
                        </div>
                    </div>

                    <!--            Course Title-->
                    <div class="form-group">
                        <label for="courseTitle" class="control-label col-md-3">Course Title:</label>
                        <div class="col-md-7">
                            <span id="courseTitle" class="form-control">
                                <?php
                                if(isset($_GET['edit'])) echo $Result=$_PublicationBao->getCourse($getRow->getPublicationCourseId())->getResultObject()->getCourseTitle();
                                elseif (isset($_POST['create'])&&!empty($_POST['course_id'])) echo $Result=$_PublicationBao->getCourse($_POST['course_id'])->getResultObject()->getCourseTitle();
                                ?>
                            </span>
                        </div>
                    </div>

                    <!--            DisciplineDDL-->
                    <div class="form-group">
                        <label for="discipline_id" class="control-label col-md-3">Discipline :</label>
                        <div class="col-md-7">
                            <select name="discipline_id" id="discipline_id" class="form-control" required>
                                <option value="" selected="selected" disabled>Select Discipline</option>
                                <?php
                                $Result=$_PublicationBao->getAllDisciplines();
                                if($Result->getIsSuccess()){
                                    $DisciplineList=$Result->getResultObject();
                                    foreach ($DisciplineList as $discipline){
                                        ?>
                                        <option value="<?php echo $discipline->getDisciplineId();?>"<?php
                                        if (isset($_GET['edit'])&&$discipline->getDisciplineId()==$getRow->getPublicationDisciplineId()) echo 'selected="selected"';
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

                    <!--            Description-->
                    <div class="form-group">
                        <label for="description" class="control-label col-md-3">Description :</label>
                        <div class=" col-md-7">
                            <textarea name="description" id="description" rows="7" class="form-control" required><?php
                                if (isset($_GET['edit'])) echo $getRow->getPublicationDescription();
                                elseif (isset($_POST['create'])&&!empty($_POST['description'])) echo $_POST['description'];
                                ?></textarea>
                            <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['description'])) echo '*Description is required';?></span>
                        </div>
                    </div>

                    <!--Report Src-->
                    <div class="form-group">
                        <div class="col-md-7">
                            <input type="hidden" name="reportsrc" id="reportsrc" class="form-control" value="<?php
                            if(isset($_GET['edit'])) echo $getRow->getPublicationPDFLink();
                            ?>">
                        </div>
                    </div>

                    <?php
                    $uploadStatus=UploadUtil::getInstance();
                    if ($uploadStatus->uploadStatus()){
                        ?>
                        <!--Report-->
                        <div class="form-group">
                            <label for="report" class="control-label col-md-3">Report :</label>
                            <div class="col-md-4">
                                <input type="file" name="report" id="report">
                            </div>
                            <div class="col-md-3 <?php if(isset($_GET['edit'])) echo 'report';?>">
                                <strong><span class="text-success">
                                <?php
                                if (isset($_GET['edit'])) {
                                    echo $getRow->getPublicationTitle().'.pdf';
                                }
                                ?>
                            </span></strong>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                    <!--Thumbnail Src-->
                    <div class="form-group">
                        <div class="col-md-7">
                            <input type="hidden" name="thumbnailsrc" id="thumbnailsrc" class="form-control" value="<?php
                            if(isset($_GET['edit'])) echo $getRow->getPublicationThumbnail();
                            ?>">
                        </div>
                    </div>

                    <!--Thumbnail-->
                    <div class="form-group">
                        <label for="thumbnail" class="control-label col-md-3">Thumbnail :</label>
                        <div class="col-md-4">
                            <input type="file" name="thumbnail" onchange="previewImage(this);" id="thumbnail"<?php if (!isset($_GET['edit'])) echo ' required';?>>
                        </div>
                        <div class="col-md-1 thumbnail" id="divPreview" <?php if(!isset($_GET['edit'])) echo 'style="display: none"'; ?>>
                            <img id="preview" src="<?php
                            if (isset($_GET['edit'])) echo $getRow->getPublicationThumbnail();
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
<!--Display all publication-->
<div class="col-md-12">
    <hr>
</div>
<div class="col-md-12">
    <div class="panel panel-table">
        <table class="table table-striped table-bordered table-responsive">
            <!--Header Row-->
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Report</th>
                <th>Year</th>
                <th>Term</th>
                <th>Course</th>
                <th>Discipline</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th><img src="./resources/img/edit.ico" alt="Edit" class="table-img"></th>
                <th><img src="./resources/img/delete.png" alt="Delete" class="table-img"></th>
            </tr>

            <!--Table Cells-->
            <?php
            $Result=$_PublicationBao->getAllPublication();
            if($Result->getIsSuccess()){
                $PublicationList=$Result->getResultObject();
                foreach ($PublicationList as $publication) {
                    ?>
                    <tr>
                        <td><a href="publication_member.php?id=<?php echo $publication->getPublicationId();?>"><img src="<?php echo $publication->getPublicationThumbnail();?>" alt="Icon" class="table-img"><?php
                                echo ' '.$publication->getPublicationTitle(); ?></a></td>

                        <td><?php if(strlen($publication->getPublicationDescription())>50){
                                echo substr($publication->getPublicationDescription(),0,50).'...';
                            }else{
                                echo $publication->getPublicationDescription();
                            }  ?></td>

                        <td class="table-cell" <?php if (empty($publication->getPublicationPDFLink())) {
                            echo 'class="text-danger"';
                        } ?>>
                        <?php
                        if (!empty($publication->getPublicationPDFLink())) {
                            ?>
                            <a href="<?php echo $publication->getPublicationPDFLink(); ?>" style="text-decoration: none"><?php
                                if(strlen($publication->getPublicationTitle())>40){
                                    echo substr($publication->getPublicationTitle(),0,40).'...'.'.pdf' ;
                                }else{
                                    echo $publication->getPublicationTitle().'.pdf';
                                } ?></a>
                            <?php
                        }else{
                            echo "No PDF Available";
                        }
                        ?>
                        </td>

                        <td class="table-cell"><?php echo $Result=$_PublicationBao->getYear($publication->getPublicationYearId())->getResultObject()->getYearName();?></td>

                        <td class="table-cell"><?php echo $Result=$_PublicationBao->getTerm($publication->getPublicationTermId())->getResultObject()->getTermName();?></td>

                        <td><?php echo $Result=$_PublicationBao->getCourse($publication->getPublicationCourseId())->getResultObject()->getCourseTitle();?></td>

                        <td><?php echo $Result=$_PublicationBao->getDiscipline($publication->getPublicationDisciplineId())->getResultObject()->getDisciplineName();?></td>

                        <td class="table-cell"><?php echo $publication->getPublicationCreatedAt();?></td>

                        <td class="table-cell"><?php echo $publication->getPublicationUpdatedAt();?></td>

                        <td class="table-cell"><a href="?edit=<?php echo $publication->getPublicationId();?>" onclick="return confirm('sure to edit !');">edit</a></td>

                        <td class="table-cell"><a href="?del=<?php echo $publication->getPublicationId();?>" class="span-danger" onclick="return confirm('sure to delete !');">delete</a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>

<!--Script for loading course title-->
<script>
    function jsFunction(course) {
        var xhttp;
        if(course==""){
            $('#courseTitle').text("No Course Selected");
        }
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange=function () {
            if(this.readyState==4&&this.status==200){
                $('#courseTitle').text(this.responseText);
            }
        };
        xhttp.open("GET","./modules/publication/ui/responseText.php?ID="+course,true);
        xhttp.send();
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#divPreview').css('display','block');
                $('#preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>