<?php
//include_once COMMON.'class.common.organisation.php';
include_once 'blade/view.searchOrganisation.blade.php';
include_once COMMON.'class.common.php';

//Search for organisations

?>
<div class="container">
    <div class="col-md-9">
        <div class="panel panel-default myPanel">
            <div class="panel-heading myHeading">
                <strong><img src="./resources/img/searchProject.png" alt="Icon" class="myImg">&nbsp;Search Organisation</strong>
            </div>

            <!-- <div class="panel  panel-default">
                <div class="panel-heading"><strong>Searching Available Organisations</strong></div> -->
            <div class="panel-body">
	        <div id="form">
		    <form method="post" class="form-horizontal">

			<div class="form-group">
          	<label class="control-label col-sm-4" for="name">Organisation Name:</label>
          		<div class="col-sm-6">       
				<input type="text" name="name" id="name" class="form-control"  placeholder="Organisation Name" required/>
			 	</div>
			</div>
            

	        <div class="form-group">        
              	<div class="col-sm-offset-2 col-sm-10">	

						 <button type="submit" name="search" id="search" >Search</button> 
				</div>
			</div>              		
		</form>	
	</div>
    </div>
        </div>
    </div>
    </div>
</div>

   
<?php
//searched organisations
 
if (isset($_POST['search'])&&(!empty($_POST['name']))){
   
    ?>
    <div class="col-md-12">
        <hr>
    </div>
    <div class="col-md-12">
    <div class="panel panel-table">
        <table class="table table-striped table-bordered table-responsive">
            <!--Header Row-->
            <tr>
                <th>Name</th>
            </tr>

            <!--Table Cells-->
            <?php
            
            $Result=$_SearchOrganisationBao->getSearchedOrganisation();
            if($Result->getIsSuccess()){
                $OrganisationList=$Result->getResultObject();

                foreach ($OrganisationList as $organisation) {
                    ?>
                    <tr>
                        <td><a href="organisation_member.php?id=<?php echo $organisation->getOrganisationId();?>"><img src="<?php echo $organisation->getOrganisationLogo();?>" alt="Icon" class="table-img"><?php
                                echo ' '.$organisation->getOrganisationName(); ?></a></td>

                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
    </div>
    <?php
}
?>