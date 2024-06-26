<?php
include_once 'blade/view.project.blade.php';
include_once COMMON.'class.common.php';
?>

<div class="container">
    <!--Heading-->
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default myPanel">
        <div class="panel-heading myHeading">
            <strong><img src="./resources/img/createproject.png" alt="Icon" class="myImg">&nbsp;Create Project</strong>
        </div>
        <div class="panel-body">

            <!--Project Creation Form-->
            <form method="post" class="form-horizontal" enctype="multipart/form-data">

                <!--            Title-->
                <div class="form-group">
                    <label for="title" class="control-label col-md-3">Title :</label>
                    <div class=" col-md-7">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Project Title" value="<?php
                        if (isset($_GET['edit'])) echo $getRow->getProjectTitle();
                        elseif (isset($_POST['create'])) echo $_POST['title'];
                        ?>" required>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['title'])) echo '*Title is required';?></span>
                    </div>
                </div>

                <!--            Language-->
                <div class="form-group">
                    <label for="language" class="control-label col-md-3">Language :</label>
                    <div class="col-md-7">
                        <input type="text" name="language" id="language" class="form-control" placeholder="Project Language" value="<?php
                        if (isset($_GET['edit'])) echo $getRow->getProjectLanguage();
                        if (isset($_POST['create'])) echo $_POST['language'];
                        ?>" required>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['language'])) echo '*Language is required';?></span>
                    </div>
                </div>

                <!--            YearDDL-->
                <div class="form-group">
                    <label for="year_id" class="control-label col-md-3">Year :</label>
                    <div class="col-md-7">
                        <select name="year_id" id="year_id" class="form-control" required>
                            <option value="" selected="selected" disabled>Select Year</option>
                            <?php
                            $Result=$_ProjectBao->getAllYears();
                            if($Result->getIsSuccess()){
                                $YearList=$Result->getResultObject();
                                foreach ($YearList as $year){
                                    ?>
                                    <option value="<?php echo $year->getYearId();?>" <?php
                                    if (isset($_GET['edit'])&& $year->getYearId()==$getRow->getProjectYearId()) echo 'selected="selected"';
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
                            $Result=$_ProjectBao->getAllTerms();
                            if($Result->getIsSuccess()) {
                                $TermList = $Result->getResultObject();
                                foreach ($TermList as $term){
                                    ?>
                                    <option value="<?php echo $term->getTermId();?>" <?php
                                    if (isset($_GET['edit'])&&$term->getTermId()==$getRow->getProjectTermId()) echo 'selected="selected"';
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
                            $Result=$_ProjectBao->getAllCourses();
                            if($Result->getIsSuccess()){
                                $CourseList=$Result->getResultObject();
                                foreach ($CourseList as $course){
                                    ?>
                                    <option value="<?php echo $course->getCourseId();?>" <?php
                                    if (isset($_GET['edit'])&&$course->getCourseId()==$getRow->getProjectCourseId()) echo 'selected="selected"';
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
                            if(isset($_GET['edit'])) echo $Result=$_ProjectBao->getCourse($getRow->getProjectCourseId())->getResultObject()->getCourseTitle();
                            elseif (isset($_POST['create'])&&!empty($_POST['course_id'])) echo $Result=$_ProjectBao->getCourse($_POST['course_id'])->getResultObject()->getCourseTitle();
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
                            $Result=$_ProjectBao->getAllDisciplines();
                            if($Result->getIsSuccess()){
                                $DisciplineList=$Result->getResultObject();
                                foreach ($DisciplineList as $discipline){
                                    ?>
                                    <option value="<?php echo $discipline->getDisciplineId();?>"<?php
                                    if (isset($_GET['edit'])&&$discipline->getDisciplineId()==$getRow->getProjectDisciplineId()) echo 'selected="selected"';
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

                <!--TeacherDDL-->
                <div class="form-group">
                    <label for="teacher_id" class="control-label col-md-3">Teacher :</label>
                    <div class="col-md-7">
                        <select name="teacher_id" id="teacher_id" class="form-control" required>
                            <option value="" selected="selected" disabled>Select Teacher</option>
                            <?php
                            $Result=$_ProjectBao->getAllTeachers();
                            if($Result->getIsSuccess()){
                                $TeacherList=$Result->getResultObject();
                                foreach ($TeacherList as $teacher) {
                                    ?>
                                    <option value="<?php echo $teacher->getID();?>"<?php
                                    if (isset($_GET['edit'])&&$teacher->getId()==$getRow->getProjectTeacherId()) echo 'selected="selected"';
                                    elseif (isset($_POST['create'])&&!empty($_POST['teacher_id'])&&$teacher->getId()==$_POST['teacher_id']) echo 'selected="selected"';
                                    ?>><?php echo $teacher->getFirstName().' '.$teacher->getLastName();?></option>
                                    <?php
                                }
                            }
                            else{
                                echo $Result->getResultObject();
                            }
                            ?>
                        </select>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['teacher_id'])) echo '*Teacher is required';?></span>
                    </div>
                </div>

                <!--            Description-->
                <div class="form-group">
                    <label for="description" class="control-label col-md-3">Description :</label>
                    <div class=" col-md-7">
                        <textarea name="description" id="description" rows="7" class="form-control" required><?php
                            if (isset($_GET['edit'])) echo $getRow->getProjectDescription();
                            elseif (isset($_POST['create'])&&!empty($_POST['description'])) echo $_POST['description'];
                            ?></textarea>
                        <span class="span-danger"><?php if (isset($_POST['create'])&&empty($_POST['description'])) echo '*Description is required';?></span>
                    </div>
                </div>

                <!--Report Src-->
                    <div class="form-group">
                        <div class="col-md-7">
                            <input type="hidden" name="reportsrc" id="reportsrc" class="form-control" value="<?php
                            if(isset($_GET['edit'])) echo $getRow->getProjectPDFLink();
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
                                    echo $getRow->getProjectPDFLink().'.pdf';
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
                        if(isset($_GET['edit'])) echo $getRow->getProjectThumbnail();
                        ?>">
                    </div>
                </div>

                <!--Thumbnail-->
                <div class="form-group">
                    <label for="thumbnail" class="control-label col-md-3">Thumbnail :</label>
                    <div class="col-md-4">
                        <input type="file" name="thumbnail" onchange="previewImage(this);" id="thumbnail"<?php if (!isset($_GET['edit'])) echo 'required';?>>
                    </div>
                    <div class="col-md-1 thumbnail" id="divPreview" <?php if(!isset($_GET['edit'])) echo 'style="display: none"'; ?>>
                        <img id="preview" src="<?php
                        if (isset($_GET['edit'])) echo $getRow->getProjectThumbnail();
                        elseif (isset($_POST['create'])) echo $_POST['thumbnail'];
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
<!--Display all projects-->
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
                <th>PDF</th>
                <th>Language</th>
                <th>Year</th>
                <th>Term</th>
                <th>Course</th>
                <th>Discipline</th>
                <th>Teacher</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th><img src="./resources/img/edit.ico" alt="Edit" class="table-img"></th>
                <th><img src="./resources/img/delete.png" alt="Delete" class="table-img"></th>
            </tr>

            <!--Table Cells-->
            <?php
            $Result=$_ProjectBao->getAllProjects();
            if($Result->getIsSuccess()){
                $ProjectList=$Result->getResultObject();

                foreach ($ProjectList as $project) {
                    ?>
                    <tr>
                        <td><a href="project_member.php?id=<?php echo $project->getProjectId();?>"><img src="<?php echo $project->getProjectThumbnail();?>" alt="Icon" class="table-img"><?php
                                echo ' '.$project->getProjectTitle(); ?></a></td>

                        <td><?php if(strlen($project->getProjectDescription())>50){
                                echo substr($project->getProjectDescription(),0,50).'...';
                            }else{
                                echo $project->getProjectDescription();
                            }  ?></td>

                             <td class="table-cell" <?php if (empty($project->getProjectPDFLink())) {
                            echo 'class="text-danger"';
                        } ?>>
                        <?php
                        if (!empty($project->getProjectPDFLink())) {
                            ?>
                            <a href="<?php echo $project->getProjectPDFLink(); ?>" style="text-decoration: none"><?php
                                if(strlen($project->getProjectTitle())>40){
                                    echo substr($project->getProjectTitle(),0,40).'...'.'.pdf' ;
                                }else{
                                    echo $project->getProjectTitle().'.pdf';
                                } ?></a>
                            <?php
                        }else{
                            echo "No PDF Available";
                        }
                        ?>
                        </td>

                        <td class="table-cell"><?php echo $project->getProjectLanguage();?></td>

                        <td class="table-cell"><?php echo $Result=$_ProjectBao->getYear($project->getProjectYearId())->getResultObject()->getYearName();?></td>

                        <td class="table-cell"><?php echo $Result=$_ProjectBao->getTerm($project->getProjectTermId())->getResultObject()->getTermName();?></td>

                        <td><?php echo $Result=$_ProjectBao->getCourse($project->getProjectCourseId())->getResultObject()->getCourseTitle();?></td>

                        <td><?php echo $Result=$_ProjectBao->getDiscipline($project->getProjectDisciplineId())->getResultObject()->getDisciplineName();?></td>

                        <td class="table-cell"><?php $Result=$_ProjectBao->getTeacher($project->getProjectTeacherId())->getResultObject();
                        echo $Result->getFirstName().' '.$Result->getLastName();?></td>

                        <td class="table-cell"><?php echo $project->getProjectCreatedAt();?></td>

                        <td class="table-cell"><?php echo $project->getProjectUpdatedAt();?></td>

                        <td class="table-cell"><a href="?edit=<?php echo $project->getProjectId();?>" onclick="return confirm('sure to edit !');">edit</a></td>

                        <td class="table-cell"><a href="?del=<?php echo $project->getProjectId();?>" class="span-danger" onclick="return confirm('sure to delete !');">delete</a></td>
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
        xhttp.open("GET","./modules/projectArchive/ui/responseText.php?ID="+course,true);
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