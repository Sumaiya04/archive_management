<?php

include_once 'blade/view.user_new.blade.php';
include_once COMMON.'class.common.php';

?>


<div class="container">

<div class="panel panel-default myPanel">

	<script type="text/javascript">



		function validatePassword(){

		var password = document.getElementById("txtPassword"); 
		var confirm_password = document.getElementById("txtConfirmPassword");

	
		  if(password.value != confirm_password.value) {
		    confirm_password.setCustomValidity("Passwords Don't Match");
		  } else {
		    confirm_password.setCustomValidity('');
		  }
		}


	</script>

    <div class="panel-heading " style="background-color: rgba(0,102,106,0.66); color: white;margin-bottom: 25px;text-align: center">
        <strong style="font-size: large"><img src="./resources/img/register.png" alt="Icon" class="myImg">&nbsp;Apply To Be a New User</strong></div>

    <div class="panel-body">

	<div id="form">
		<form method="post" class="form-horizontal">

			<div class="form-group">
              	<label class="control-label col-sm-3" for="txtUniversityID">University ID:</label>
              	<div class="col-sm-8">
              	<input type="text" name="txtUniversityID" class="form-control" placeholder="University Identity"/>
			  	</div>
			</div>
	
			<div class="form-group">
              	<label class="control-label col-sm-3" for="txtFirstName">First Name:</label>
              	<div class="col-sm-8">
				<input type="text" name="txtFirstName" class="form-control" placeholder="First Name"  required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-3" for="txtLastName">Last Name:</label>
              	<div class="col-sm-8">
				<input type="text" name="txtLastName" class="form-control" placeholder="Last Name" required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-3" for="txtEmail">Email:</label>
              	<div class="col-sm-8">
			  	<input type="email" name="txtEmail" class="form-control" placeholder="Email Address" required/>

			  	</div>
			</div>
			
			<div class="form-group">
              	<label class="control-label col-sm-3" for="txtPassword">Password:</label>
              	<div class="col-sm-8">
				<input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Password" 
					onchange="validatePassword()" required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-3" for="txtConfirmPassword">Confirm Password:</label>
              	<div class="col-sm-8">
				<input type="password" id="txtConfirmPassword" name="txtConfirmPassword" class="form-control" placeholder="Re-enter Password" 
					onchange="validatePassword()" 
					 required/>
				</div>
			</div>

			<div class="form-group">
              	<label class="control-label col-sm-3" for="selectRole">User Role:</label>
              	<div class="col-sm-8">
						   						    
						<select name="selectRole" class="form-control" id="select-from-roles" required>
							<option selected disabled>Select Role</option>
							<option value="teacher">Teacher</option>
							<option value="student">Student</option>
						</select>	
				</div>
			</div>
	        <div class="form-group">        
              <div class="col-sm-offset-3 col-sm-8">

						<button type="submit" class="btn btn-primary" value="request" name="request">Submit Request</button>

			    </div>
            </div> 
		</form>

	</div>
	</div>

</div>

</div>

