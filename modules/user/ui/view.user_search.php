<?php

include_once COMMON.'class.common.php';
include_once COMMON.'class.common.user.php';
include_once 'blade/view.user_search.blade.php';


?>
<div class="container">
<div class="panel panel-default myPanel">

    <div class="panel-heading myHeading" style="background-color: rgba(0,102,106,0.66); color: white">
        <strong><img src="./resources/img/search.png" alt="Icon" class="myImg">&nbsp;Search User</div>


    <div class="panel-body">

	<div id="form">
		<form method="post" class="form-horizontal">

			<div class="form-group">
              	<label class="control-label col-sm-4" for="assignedRoles">Assigned Role:</label>
              	<div class="col-sm-6">		
						   
						    <?php
						    // this block of code prints the list box of roles with current assigned  roles

						    $var = '<select name="assignedRoles" class="form-control" id="assignedRoles" required>';
							$Result = $_RoleBAO->getAllRoles();
								//if DAO access is successful to load all the Roles then show them one by one
							if($Result->getIsSuccess()){

								$Roles = $Result->getResultObject();
							
						       for ($i=0; $i < sizeof($Roles); $i++) { 
						       		
						       		$Role = $Roles[$i];
						    
						    		$var = $var. '<option value="'.$Role->getID().'"';   			

						          	$var = $var.'>'.$Role->getName().'</option>';
					
								}

								$var = $var.'</select>';
							}
							echo $var;
							?>	
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-4" for="selectedField">Search Field::</label>
              	<div class="col-sm-6">								   						    
						<select name="selectedField" class="form-control" id="selectedField" required>
							<option selected disabled>Select Search Criteria</option>
							<option value="UniversityID">University ID</option>
							<option value="Email">Email</option>
							<option value="FirstName">First Name</option>
							<option value="LastName">Last Name</option>
						</select>	
				</div>
			</div>


			<div class="form-group">
              	<label class="control-label col-sm-4" for="txtSearch">Search Text</label>
              	<div class="col-sm-6">
              	<input type="text" name="txtSearch" class="form-control" placeholder="Input the search text" required/>
			  	</div>
			</div>
			  
	        <div class="form-group">        
              <div class="col-sm-offset-3 col-sm-7">
    
					<button type="submit" value="search" class="btn btn-primary" name="search">Search</button>

			   </div>
            </div> 
		</form>

	</div>
	</div>

	<div class="panel-body">

	<table class="table table-bordered table-striped">
	<?php
	//search clicked and result loaded
	if(isset($_POST['search']) && isset($ResultSearch))
	{
	
	
	//if DAO access is successful to load all the users then show them one by one
	if($ResultSearch->getIsSuccess()){

		$UserList = $ResultSearch->getResultObject();
	?>
		<tr>
			<th>University ID</th>
			<th>Email</th>
			<th>Password</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Status</th>
            <th><img src="./resources/img/details.png" alt="Details" class="table-img"></th>
		</tr>
		<?php
		for($i = 0; $i < sizeof($UserList); $i++) {
			$User = $UserList[$i];
			?>
		    <tr class="table-cell">
			    <td><?php echo $User->getUniversityID(); ?></td>
			    <td><?php echo $User->getEmail(); ?></td>
			    <td><?php echo $User->getPassword(); ?></td>
			    <td><?php echo $User->getFirstName(); ?></td>
			    <td><?php echo $User->getLastName(); ?></td>
			    <td><?php echo $User->getStatus(); ?></td>
			    <td>
				    <a href="user_details.php?id=<?php echo $User->getID(); ?>" onclick="return; " >details</a>
				    </td>

			    </tr>
	    <?php

		}

	}
	else{

		echo $ResultSearch->getResultObject(); //giving failure message
	}
	
	}

	?>
	</table>
	</div>

</div>
</div>