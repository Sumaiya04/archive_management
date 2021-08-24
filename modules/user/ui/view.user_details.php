<?php

include_once COMMON.'class.common.php';
include_once 'blade/view.user_details.blade.php';
?>

<script>
	 function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<div class="container">
<div class="panel panel-default myPanel">

    <div class="panel-heading myHeading" style="background-color: rgba(0,102,106,0.66); color: white">
        <strong><img src="./resources/img/userInfo.png" alt="Icon" class="myImg">&nbsp;Detailed User Information</div>

    <div class="panel-body">

	<div id="form">
		<form method="post" class="form-horizontal" enctype="multipart/form-data">
            <!--Image Src-->
            <div class="form-group">
                <div class="col-md-7">
                    <input type="hidden" name="imagesrc" id="imagesrc" class="form-control" value="<?php
                    echo $userDetails->getImage();
                    ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    <img id="preview" src="<?php
                    if (!empty($userDetails->getImage())){
                        echo $userDetails->getImage();
                    }else{
                        echo './resources/img/avatar.png';
                    }
                    ?>" alt="Avatar" height="120px" width="120px" class="img-rounded">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-4" for="profilePic">Change Picture:</label>
                <div class="col-sm-6">
                    <input type="file" name="image" id="image" onchange="previewImage(this);">
                </div>
            </div>

            <div class="form-group">
              	<label class="control-label col-sm-4" for="txtUniversityID">University ID:</label>
              	<div class="col-sm-6">
              	<input type="text" name="txtUniversityID" class="form-control" placeholder="University Identity" value="<?php echo $userPositions->getUniversityID(); ?>" required/>
			  	</div>
			</div>
			  
			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtEmail">Email:</label>
              	<div class="col-sm-6">
			  	<input type="email" name="txtEmail" class="form-control" placeholder="Email Address" value="<?php echo $userPositions->getEmail(); ?>" readonly/>

			  	</div> 
			</div>
			
			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtPassword">Password:</label>
              	<div class="col-sm-6">  		
				<input type="password" name="txtPassword" class="form-control" placeholder="Password" value="<?php echo $userPositions->getPassword(); ?>" required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtFirstName">First Name:</label>
              	<div class="col-sm-6">  		
				<input type="text" name="txtFirstName" class="form-control" placeholder="First Name" value="<?php echo $userPositions->getFirstName(); ?>" required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtLastName">Last Name:</label>
              	<div class="col-sm-6">	
				<input type="text" name="txtLastName" class="form-control" placeholder="Last Name" value="<?php echo $userPositions->getLastName(); ?>" required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtFatherName">Father's Name:</label>
              	<div class="col-sm-6">	
				<input type="text" name="txtFatherName" class="form-control" placeholder="Father's Name" value="<?php echo $userDetails->getFatherName(); ?>" required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtMotherName">Mother's Name:</label>
              	<div class="col-sm-6">	
				<input type="text" name="txtMotherName" class="form-control" placeholder="Mother's Name" value="<?php echo $userDetails->getMotherName(); ?>" required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtPermanentAddress">Permanent Address:</label>
              	<div class="col-sm-6">	
				<input type="text" name="txtPermanentAddress" class="form-control" placeholder="Permanent Address" value="<?php echo $userDetails->getPermanentAddress(); ?>" required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtHomePhone">Home Phone:</label>
              	<div class="col-sm-6">	
				<input type="text" name="txtHomePhone" class="form-control" placeholder="Home Phone" value="<?php echo $userDetails->getHomePhone(); ?>" required/>
				</div>
			</div>			

			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtCurrentAddress">Current Address:</label>
              	<div class="col-sm-6">	
				<input type="text" name="txtCurrentAddress" class="form-control" placeholder="Current Address" value="<?php echo $userDetails->getCurrentAddress(); ?>" required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtMobilePhone">Mobile Phone:</label>
              	<div class="col-sm-6">	
				<input type="text" name="txtMobilePhone" class="form-control" placeholder="Mobile Phone" value="<?php echo $userDetails->getMobilePhone(); ?>" required/>
				</div>
			</div>				

			<div class="form-group">
              	<label class="control-label col-sm-4" for="assignedRoles">Assigned Roles:</label>
              	<div class="col-sm-6">		
						   
						    <?php
						    // this block of code prints the list box of roles with current assigned  roles

						    $var = '<select name="assignedRoles[]" class="form-control" id="select-from-roles" multiple readonly>';
							$Result = $_RoleBAO->getAllRoles();
								//if DAO access is successful to load all the Roles then show them one by one
							if($Result->getIsSuccess()){

								$Roles = $Result->getResultObject();
							
						       for ($i=0; $i < sizeof($Roles); $i++) { 
						       		
						       		$Role = $Roles[$i];
						    
						    		$var = $var. '<option value="'.$Role->getID().'"';   			

						       		if(isRoleAvailable($Role,$userPositions->getRoles())) {
						          		$var = $var.' selected="selected"';
						          	} 

						          	$var = $var.'>'.$Role->getName().'</option>';
					
								}

								$var = $var.'</select>';
							}
							echo $var;
							?>	
				</div>
			</div>
			<div class="form-group">
              	<label class="control-label col-sm-4" for="assignedPositions">Assigned Positions:</label>
              	<div class="col-sm-6">		
			
						    <?php
						    // this block of code prints the list box of Positions with current assigned  Positions


						    $var = '<select name="assignedPositions[]" class="form-control" id="select-from-positions" multiple readonly>';
							$Result = $_PositionBAO->getAllPositions();
								//if DAO access is successful to load all the Positions then show them one by one
							if($Result->getIsSuccess()){

								$Positions = $Result->getResultObject();
							
						       for ($i=0; $i < sizeof($Positions); $i++) { 
						       		
						       		$Position = $Positions[$i];
						    
						    		$var = $var. '<option value="'.$Position->getID().'"';   			

						       		if(isPositionAvailable($Position,$userPositions->getPositions())) 
						       		{
						          		$var = $var.' selected="selected"';
						          	} 

						          	$var = $var.'>'.$Position->getName().'</option>';
					
								}

								$var = $var.'</select>';
							}
							echo $var;
							?>	
				</div>
			</div>
	        <div class="form-group">        
              <div class="col-sm-offset-3 col-sm-7">
    
					<button type="submit" value="update" name="update" class="btn btn-primary">Update</button>

			   </div>
            </div> 
		</form>

	</div>
	</div>

</div>
</div>
