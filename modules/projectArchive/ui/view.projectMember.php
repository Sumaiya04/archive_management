<?php
include_once 'blade/view.projectMember.blade.php';
include_once COMMON.'class.common.php';
?>

<div class="container">
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default myPanel">
        <div class="panel-heading myHeading" style="margin-bottom: 0vh">
            <strong><img src="<?php
                $Project->setProjectId($_GET['id']);
                $Result=$_ProjectBao->getProject($Project)->getResultObject();
                echo $Result->getProjectThumbnail();?>" alt="Icon" class="myImg">&nbsp;<?php
                echo $Result->getProjectTitle()?></strong>
        </div>
        <div class="panel-body">
            <div class="form-horizontal">

                <!--Hidden Id-->
                <div class="form-group">
                    <div class=" col-md-7">
                        <input type="hidden" name="pid" id="pid" class="form-control" value="<?php
                        echo $Result->getProjectId(); ?>">
                    </div>
                </div>

                <!--Short Description-->
                <div id="shortDescription" class="form-group">
                    <label for="description" class="control-label col-md-3">Description :</label>
                    <div id="description" class=" control-label col-md-8 text-justify">
                        <?php
                        if(strlen($Result->getProjectDescription())>250){
                            echo substr($Result->getProjectDescription(),0,250).'...'.'<a href="#" onclick="rmFunction();">Read more</a>';
                        }
                        else{
                            echo $Result->getProjectDescription();
                        }
                        ?>
                    </div>
                </div>

                <!--Long Description-->
                <div id="longDescription" class="form-group" style="display: none">
                    <label for="description" class="control-label col-md-3">Description :</label>
                    <div id="description" class=" control-label col-md-8 text-justify">
                        <?php
                        echo $Result->getProjectDescription();
                        ?>
                    </div>
                </div>

                <!--Link(s)-->
                <div class="form-group">
                    <label for="link" class="control-label col-md-3">Link(s) :</label>
                    <div id="link" class="control-label col-md-8 text-justify">
                        <?php
                        $LinkList=$_MemberBao->getLink($Project)->getResultObject();
                        if ($LinkList!=null) {
                            foreach ($LinkList as $link) {
                                ?>
                                <a href="<?php echo $link->getLink();?>"><?php echo $link->getLink();?></a>
                                <?php
                                    if (isset($_SESSION['login.php'])) {
                                        ?>
                                        <a href="?id=<?php echo $Result->getProjectId(); ?>&rlid=<?php echo $link->getLinkProjectId(); ?>"
                                           class="remove-icon" onclick="return confirm('sure to remove !!');">&nbsp;&nbsp;
                                            <img src="./resources/img/removeLink.png" alt="Edit"
                                                 class="table-img">
                                        </a>
                                        <?php
                                    }
                                    ?>
                                <br>
                                <br>
                                <?php
                            }
                        }else{
                            echo "No link added";
                        }
                        ?>
                    </div>
                </div>

                <!--Report-->
                <div class="form-group">
                    <label for="link" class="control-label col-md-3">Report :</label>
                    <div id="link" class="control-label col-md-8 text-justify">
                        <?php
                        echo '<a href="'.$Result->getProjectPDFLink().'">'.$Result->getProjectTitle().'.pdf'.'</a>';
                        ?>
                    </div>
                </div>


                <!--Language-->
                <div class="form-group">
                    <label for="language" class="control-label col-md-3">Language :</label>
                    <div id="language" class="control-label col-md-8 text-justify">
                        <?php
                        echo $Result->getProjectLanguage();
                        ?>
                    </div>
                </div>

                <!--Year-->
                <div class="form-group">
                    <label for="year_id" class="control-label col-md-3">Year :</label>
                    <div id="year_id" class="control-label col-md-8 text-justify">
                        <?php
                        echo $_ProjectBao->getYear($Result->getProjectYearId())->getResultObject()->getYearName();
                        ?>
                    </div>
                </div>

                <!--Term-->
                <div class="form-group">
                    <label for="term_id" class="control-label col-md-3">Term :</label>
                    <div id="term_id" class="control-label col-md-8 text-justify">
                        <?php
                        echo $_ProjectBao->getTerm($Result->getProjectTermId())->getResultObject()->getTermName();
                        ?>
                    </div>
                </div>

                <!--Course-->
                <div class="form-group">
                    <label for="course_id" class="control-label col-md-3">Course :</label>
                    <div id="course_id" class="control-label col-md-8 text-justify">
                        <?php
                        echo $_ProjectBao->getCourse($Result->getProjectCourseId())->getResultObject()->getCourseTitle();
                        ?>
                    </div>
                </div>

                <!--Discipline-->
                <div class="form-group">
                    <label for="discipline_id" class="control-label col-md-3">Discipline :</label>
                    <div id="discipline_id" class="control-label col-md-8 text-justify">
                        <?php
                        echo $_ProjectBao->getDiscipline($Result->getProjectDisciplineId())->getResultObject()->getDisciplineName();
                        ?>
                    </div>
                </div>

                <!--Teacher-->
                <div class="form-group">
                    <label for="teacher_id" class="control-label col-md-3">Teacher :</label>
                    <div id="teacher_id" class="control-label col-md-8 text-justify">
                        <?php
                        $Name=$_ProjectBao->getTeacher($Result->getProjectTeacherId())->getResultObject();
                        echo $Name->getFirstName().' '.$Name->getLastName();
                        ?>
                    </div>
                </div>

                <!--CreatedAt-->
                <div class="form-group">
                    <label for="created_at" class="control-label col-md-3">Created At :</label>
                    <div id="created_at" class="control-label col-md-8 text-justify">
                        <?php
                        echo date_format(new DateTime($Result->getProjectCreatedAt()),"d-M-Y").' '.'at'.' '.date_format(new DateTime($Result->getProjectCreatedAt()),"h:i:sa");
                        ?>
                    </div>
                </div>

                <!--UpdatedAt-->
                <div class="form-group">
                    <label for="updated_at" class="control-label col-md-3">Updated At :</label>
                    <div id="updated_at" class="control-label col-md-8 text-justify">
                        <?php
                        echo date_format(new DateTime($Result->getProjectUpdatedAt()),"d-M-Y").' '.'at'.' '.date_format(new DateTime($Result->getProjectUpdatedAt()),"h:i:sa");
                        ?>
                    </div>
                </div>

                <!--Member(s)-->
                <div class="form-group">
                    <label for="member" class="control-label col-md-3">Member(s) :</label>
                    <div id="member" class="control-label col-md-8 text-left">
                        <?php
                        $MemberList=$_MemberBao->getMember($Project)->getResultObject();
                        if ($MemberList!=null) {
                            $i=0;
                            foreach ($MemberList as $member) {
                                ?>
                                    <?php $Name = $_MemberBao->getStudent($member->getStudentId())->getResultObject();
                                    echo $Name->getFirstName() . ' ' . $Name->getLastName();?>
                                    <div class="progress myProgressBar">
                                        <?php
                                        $val=$member->getContribution();
                                        ?>
                                        <div id="progressBar<?php echo $i; ?>" class="<?php
                                        if ($val<26){
                                            echo 'progress-bar progress-bar-danger';
                                        }elseif ($val<76){
                                            echo 'progress-bar progress-bar-warning';
                                        }else{
                                            echo 'progress-bar progress-bar-success';
                                        }
                                        ?>" style="width:<?php echo $val;?>%">

                                                <span id="progressVal<?php echo $i; ?>" class="myProgressVal" style="display: <?php
                                                if ($val>10){
                                                    echo 'block';
                                                }else{
                                                    echo 'none';
                                                }
                                                ?>"><?php echo $val;?>%</span>
                                        </div>
                                    </div>
                                <?php
                                $i++;
                            }
                        }else{
                            echo "No member assigned";
                        }
                        ?>
                    </div>
                </div>


                <?php
                if(isset($_SESSION['login.php'])){
                    ?>
                    <hr>
                    <!--Add Link-->
                    <form method="post">
                    <div class="form-group">
                        <label for="link_add" class="control-label col-md-3 text-info">Add Link :</label>
                        <div class="col-md-6">
                            <input type="url" name="link_add" id="link_add" class="form-control alert-info" placeholder="Link..." required>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="add" id="add" class="btn btn-default" value="Add">
                        </div>
                    </div>
                    </form>

                    <!--Add Member(s)-->
                    <div class="form-group">
                        <label for="student_add" class="control-label col-md-3 text-info">Add Member :</label>
                        <div class="col-md-6">
                            <input type="search" name="student_add" id="student_add" class="form-control alert-info" onkeyup="addFunction(this.value);" placeholder="Search..." required>
                            <div id="addStudent" class="control-label text-left"></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    </div>
</div>
<!--Display all member(s)-->
<div class="col-md-12">
    <hr>
</div>
<?php
if (isset($_SESSION['login.php'])) {
    $MemberList = $_MemberBao->getMember($Project)->getResultObject();
    if ($MemberList != null) {
        ?>
        <div class="col-md-12">
        <div class="panel panel-table">
            <table class="table table-striped table-bordered table-responsive">
                <!--Header Row-->
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contribution (%)</th>
                    <th><img src="./resources/img/edit.ico" alt="Edit"
                                                        class="table-img"></th>
                    <th><img src="./resources/img/delete.png" alt="Delete"
                                                        class="table-img"></th>
                </tr>

                <!--Table Cells-->
                <?php
                $i = 0;
                foreach ($MemberList as $member) {
                    ?>
                    <tr class="table-cell">
                        <td><?php $Name = $_MemberBao->getStudent($member->getStudentId())->getResultObject();
                            echo $Name->getFirstName() . ' ' . $Name->getLastName(); ?></td>

                        <td><?php echo '<a href="user_details.php?id=' . $Name->getEmail() . '" style="text-decoration: none">' . $Name->getEmail() . '</a>' ?></td>

                        <td>
                            <input type="number" name="contribution"
                                   value="<?php echo $member->getContribution(); ?>" id="contribution"
                                   class="form-control" min="0"
                                   max="100" style="display: none" onblur="updateFunction(this);">
                            <span id="spnContribution"><?php echo $member->getContribution(); ?></span>
                        </td>

                        <td>
                            <input type="hidden" name="projId" id="projId"
                                   value="<?php echo $Result->getProjectId(); ?> ">
                            <input type="hidden" name="userId" id="userId" value="<?php echo $Name->getEmail(); ?>">
                            <input type="hidden" name="memberId" id="memberId" value="<?php echo $i; ?>">
                             <button type="button" class="btn-link" onclick="editFunction(this);"
                                    id="btnEdit<?php echo $i; ?>">edit
                            </button>                   
                        </td>

                        <td><a class="span-danger"
                                    href="?id=<?php echo $Result->getProjectId(); ?>&ruid=<?php echo $Name->getEmail(); ?>"
                                    onclick="return confirm('sure to remove !!');">delete</a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </table>
        </div>
        </div>
        <?php
    }
}
?>

<!--Script for searching and adding members-->
<script>
    function rmFunction() {
        $('#shortDescription').hide();
        $('#longDescription').show();
    }

    function addFunction(emailStr) {
        var val=$('#pid').val();
        if(emailStr.length==0){
            $('#addStudent').html("");
        }
        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function () {
            if(this.readyState==4&&this.status==200){
                $('#addStudent').html(this.responseText);
            }
        };
        xmlhttp.open("GET","./modules/projectArchive/ui/addResponse.php?key="+emailStr+"&pid="+val,true);
        xmlhttp.send();
    }

    function editFunction(element) {
        var parent=element.parentNode.parentNode;
        var child=parent.childNodes[5];
        var txt=child.childNodes[1];
        var spn=child.childNodes[3];
        txt.style.display='block';
        spn.style.display='none';
    }

    function updateFunction(element) {
        var parent=element.parentNode.parentNode;
        var child=parent.childNodes[5];
        var txt=child.childNodes[1];
        var spn=child.childNodes[3];
        var contribution=0;
        if (parseInt(txt.value)>100){
            contribution=100;
        }
        else if (parseInt(txt.value)<0){
            contribution=0;
        }
        else{
            contribution=txt.value;
        }
        txt.style.display='none';
        spn.style.display='block';
        var user=parent.childNodes[7];
        var id=user.childNodes[3];
        var progressId=user.childNodes[5];
        var progressBar='progressBar'+progressId.value;
        var progressVal='progressVal'+progressId.value;
        var projId=$('#projId').val();
        var userId=id.value;
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange=function () {
            if(this.readyState==4&&this.status==200){
                spn.innerText=this.responseText;
                var response=parseInt(this.responseText);

                $('#'+progressVal).text(this.responseText+'%');
                if (response>10){
                    $('#'+progressVal).css('display','block');
                }else{
                    $('#'+progressVal).css('display','none');
                }

                $('#'+progressBar).css('width',this.responseText+'%');
                if(response<25){
                    $('#'+progressBar).attr('class','progress-bar progress-bar-danger');
                }
                else if (response<75){
                    $('#'+progressBar).attr('class','progress-bar progress-bar-warning');
                }
                else {
                    $('#'+progressBar).attr('class','progress-bar progress-bar-success');
                }

            }
        };
        xhttp.open("GET","./modules/projectArchive/ui/contribution.php?pid="+projId+"&uid="+userId+"&conval="+contribution,true);
        xhttp.send();
    }
</script>