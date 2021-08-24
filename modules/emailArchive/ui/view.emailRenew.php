<?php
include_once 'blade/view.emailRenew.blade.php';
include_once COMMON.'class.common.php';
include_once COMMON.'class.paginate.php';
?>

<div class="col-md-12 myContainer">
    <div class="panel panel-table">
        <table class="table table-bordered table-responsive">
                <!--Header Row-->
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Contact Email</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Expire At</th>
                    <th>Validity</th>
                    <th><img src="./resources/img/renew.png" alt="Renew" class="table-img"></th>
                </tr>

                <!--Table Cells-->
                <?php
                $results_per_page=10;

                $_Paginate=new Paginate();
                $EmailList=$_Paginate->loadPaginatedData($_EmailRenewBao->getLimitEmail($_Paginate->paginationInitial(),$results_per_page));

                //var_dump($EmailList);
                $i=0;
                foreach ($EmailList as $email) {

                    $expire = $email->getEmailExpireAt();
                    $currentDate = new DateTime('now');
                    //var_dump($currentDate);
                    $expireDate = new DateTime($expire);
                    $validity = date_diff($currentDate, $expireDate);
                    //var_dump($validity);
                    $isValid = true;
                    $safe = true;
                    $warning = false;
                    $danger = false;
                    if ($validity->format("%R%a") > 90) {
                        $isValid = true;
                        $safe = true;
                        $warning = false;
                        $danger = false;
                    } elseif ($validity->format("%R%a") > 30) {
                        $isValid = true;
                        $safe = false;
                        $warning = true;
                        $danger = false;
                    } elseif ($validity->format("%R%a") > -1) {
                        $isValid = true;
                        $safe = false;
                        $warning = false;
                        $danger = true;
                    } else {
                        $isValid = false;
                        $safe = false;
                        $warning = false;
                        $danger = true;
                    }
                    ?>
                    <?php
                    if ($isValid) {
                        ?>
                        <tr class="table-cell<?php
                        if ($isValid) {
                            if ($safe) {
                                echo ' alert-success';
                            } elseif ($warning) {
                                echo ' alert-warning';
                            } else {
                                echo ' alert-danger';
                            }
                        } else {
                            echo ' alert-danger';
                        }
                        ?>">
                            <td style="color: darkblue"><?php echo $email->getEmailEmail(); ?></td>
                            <td><?php echo $email->getEmailFirstName() . ' ' . $email->getEmailLastName(); ?></td>
                            <td><?php echo $email->getEmailContact(); ?></td>
                            <td><?php echo $email->getEmailContactEmail(); ?></td>
                            <td><?php echo $email->getEmailAddress(); ?></td>
                            <td>
                                <span id="spnCreatedAt"><?php echo $email->getEmailCreatedAt(); ?></span>
                            </td>
                            <td>
                                <input type="date" name="expireAt"
                                       value="<?php echo $email->getEmailExpireAt(); ?>" id="expireAt"
                                       class="form-control" style="display: none" onblur="renewFunction(this);">
                                <span id="spnExpireAt"><?php echo $email->getEmailExpireAt(); ?></span>
                            </td>
                            <td><?php if ($validity->format("%R%a")>1){
                                echo $validity->format("%a").' '.'days';
                                }else{
                                echo $validity->format("%a").' '.'day';
                                } ?></td>
                            <td>
                                <input type="hidden" name="emailId" id="emailId"
                                       value="<?php echo $email->getEmailId(); ?>">
                                <button type="button" class="btn-link span-success"
                                        id="btnRenew<?php echo $i; ?>" onclick="editFunction(this);">
                                    renew
                                </button>
                            </td>

                        </tr>
                        <?php
                        $i++;
                    }
                }
                ?>
            </table>
    </div>

    <!--Pagination-->
    <?php
    echo $_Paginate->paginate($results_per_page,PageUtil::$EMAIL_RENEW,$_EmailRenewBao->getRenewEmail());
        ?>
</div>

<script>
    function editFunction(element) {
        var parent=element.parentNode.parentNode;
        var child=parent.childNodes[13];
        var txt=child.childNodes[1];
        var spn=child.childNodes[3];
        txt.style.display='block';
        spn.style.display='none';
    }

    function renewFunction(element) {
        var parent=element.parentNode.parentNode;
        var child=parent.childNodes[13];
        var txt=child.childNodes[1];
        var spn=child.childNodes[3];
        var expireAt=txt.value;
        txt.style.display='none';
        spn.style.display='block';
        var email=parent.childNodes[17];
        var id=email.childNodes[1];
        var emailId=id.value;
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange=function () {
            if(this.readyState==4&&this.status==200){
                spn.innerText=this.responseText;
                var current=new Date().toDateString();
                var currentDate=new Date(current).getTime();
                var expireDate=new Date(this.responseText).getTime();
                var validity=expireDate-currentDate;
                var validityDays = Math.floor(validity/ (1000 * 60 * 60 * 24));
                console.log(validityDays);
                if (validityDays>90){
                    parent.className='table-cell alert-success';
                }
                else if(validityDays>30){
                    parent.className='table-cell alert-warning';
                }
                else if(validityDays>-1){
                    parent.className='table-cell alert-danger';
                }else{
                    parent.className='table-cell alert-danger';
                    parent.style.display='none';
                }
            }
        };
        xhttp.open("GET","./modules/emailArchive/ui/renew.php?eid="+emailId+"&exp="+expireAt,true);
        xhttp.send();
    }
</script>