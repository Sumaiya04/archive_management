<?php

include_once 'blade/view.position.blade.php';
include_once COMMON.'class.common.php';

?>
<div class="container">
<div class="panel panel-default myPanel">

    <div class="panel-heading myHeading" style="background-color: rgba(0,102,106,0.66); color: white">
        <strong><img src="./resources/img/position.png" alt="Icon" class="myImg">&nbsp;Position Information</div>


    <div class="panel-body">

	<div id="form">
		<form method="post" class="form-horizontal">
				
				<div class="form-group">
              	<label class="control-label col-sm-3" for="txtName">Position Name:</label>
              	<div class="col-sm-7">
					<input type="text" name="txtName" class="form-control" placeholder="Position Name" value="<?php
					if(isset($_GET['edit'])) echo $getROW->getName();  ?>" />
				</div>
				</div>
		        <div class="form-group">        
	              <div class="col-sm-offset-3 col-sm-7">
						<?php
						if(isset($_GET['edit']))
						{
							?>
							<button type="submit" name="update" class="btn btn-primary">Update</button>
							<?php
						}
						else
						{
							?>
							<button type="submit" name="save" class="btn btn-primary">Save</button>
							<?php
						}
						?>
				</div>
				</div>
		</form>
	</div>
	</div>

	<div class="panel-body">


	<table class="table table-striped table-bordered">

	<?php
	
	
	$Result = $_PositionBAO->getAllPositions();

	//if DAO access is successful to load all the Positions then show them one by one
	if($Result->getIsSuccess()){

		$PositionList = $Result->getResultObject();
	?>
		<tr>
			<th>Position Name</th>
            <th><img src="./resources/img/edit.ico" alt="Edit" style="height: 20px;width: 20px"></th>
            <th ><img src="./resources/img/delete.png" alt="Delete" style="height: 20px;width: 20px"></th>
		</tr>
		<?php
		for($i = 0; $i < sizeof($PositionList); $i++) {
			$Position = $PositionList[$i];
			?>
		    <tr>
			    <td><?php echo $Position->getName(); ?></td>
			    <td style="text-align: center"><a href="?edit=<?php echo $Position->getID(); ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
			    <td style="text-align: center"><a href="?del=<?php echo $Position->getID(); ?>" style="color: darkred" onclick="return confirm('sure to delete !'); " >delete</a></td>
		    </tr>
	    <?php

		}

	}
	else{

		echo $Result->getResultObject(); //giving failure message
	}

	?>
	</table>
	</div>
</div>
</div>
