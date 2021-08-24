<?php

include_once 'blade/view.discussion.blade.php';
include_once COMMON.'class.common.php';
?>

<div class="container">
<div class="panel panel-default myPanel">

    <div class="panel-heading myHeading" style="background-color: rgba(0,102,106,0.66); color: white">
        <strong><img src="./resources/img/discussion.png" alt="Icon" class="myImg">&nbsp;Discussion</div>
    
    <div class="panel-body">

	<div id="form">
		<form method="post" class="form-horizontal">

			<div class="form-group">
				<label class="control-label col-sm-3" for="txtQuestion">Question Title : </label>
				<div class="col-sm-7">
					<input type="text" class="form-control"  name="txtQuestion" placeholder="Question Title" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getName();  ?>" />
				
				</div>
			</div>	

			<div class="form-group">
				<label class="control-label col-sm-3" for="txtCat">Category Name : </label>
				<div class="col-sm-7">
						    <?php
						    // this block of code prints the list box of roles with current assigned  roles

						    $var = '<select name="txtCat" class="form-control"  id="select-from-cat">';
							$Result = $_DiscussionCategoryBAO->getAllDiscussionCategorys();
								//if DAO access is successful to load all the Roles then show them one by one
							if($Result->getIsSuccess()){

								$DiscussionCategorys = $Result->getResultObject();
							
						       for ($i=0; $i < sizeof($DiscussionCategorys); $i++) { 
						       		
						       		$DiscussionCategory = $DiscussionCategorys[$i];
						    
						    		$var = $var. '<option value="'.$DiscussionCategory->getID().'"';   			

						          	$var = $var.'>'.$DiscussionCategory->getName().'</option>';
					
								}

								$var = $var.'</select>';
							}
							echo $var;
							?>	
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3" for="txtTag">Tag : </label>
				<div class="col-sm-7">
					<input type="text" class="form-control"  name="txtTag" placeholder="Tag" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getTag();  ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="txtDes">Description : </label>
				<div class="col-sm-7">
					<textarea rows="10" cols="40" class="form-control"  name="txtDes" placeholder="Description" 
					value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getDescription();  ?>" >					
					</textarea>
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
	
	
	$Result = $_DiscussionBAO->getAllDiscussions();

	//if DAO access is successful to load all the Terms then show them one by one
	if($Result->getIsSuccess()){

		$DiscussionList = $Result->getResultObject();
	?> 
		<tr>
			<th>Questions</th>
			<th>Category</th>
			<th>Tags</th>
            <th><img src="./resources/img/edit.ico" alt="Edit" class="table-img"></th>
            <th><img src="./resources/img/delete.png" alt="Delete" class="table-img"></th>
		</tr>
		<?php
		for($i = 0; $i < sizeof($DiscussionList); $i++) {
			$Discussion = $DiscussionList[$i];
			?>
		    <tr>
		    <td><a href="discussion_comment.php?view=<?php echo $Discussion->getID(); ?>" onclick="return ; " >
		    <?php echo $Discussion->getName(); ?></a></td>
			    <td><?php $id = $Discussion->getCategory();
			    	$Result2 = $_DiscussionBAO->getNameFromCatagoryID($id);
			    	if ($Result2->getIsSuccess()) {
			    		$DiscussionCategory = $Result2->getResultObject();

			    		echo $DiscussionCategory->getName();
			    	}
			    	//echo $_DiscussionBAO->getNameFromCatagoryID($id); ?></td>
			    <td><?php echo $Discussion->getTag(); ?></td>
			    <td style="text-align: center"><a href="?edit=<?php echo $Discussion->getID(); ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
			    <td style="text-align: center"><a href="?del=<?php echo $Discussion->getID(); ?>" style="color:darkred" onclick="return confirm('sure to delete !'); " >delete</a></td>
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

<div class="panel panel-default myPanel">

    <div class="panel-heading" style="background-color: rgba(0,102,106,0.66); color: white;text-align: center;margin-bottom: 25px;font-size: large">
        <strong><img src="./resources/img/searchDiscussion.png" alt="Icon" style="height: 30px;width: 30px;">&nbsp;Search Discussion</div>

	<div class="panel-body">

	
		<table class="table table-bordered">
			<tr>
				<th>Category</th>
			</tr>
			<?php
				$Result = $_DiscussionCategoryBAO->getAllDiscussionCategorys();
									//if DAO access is successful to load all the Roles then show them one by one
				if($Result->getIsSuccess())
				{

					$DiscussionCategorys = $Result->getResultObject();
								
			        for ($i=0; $i < sizeof($DiscussionCategorys); $i++) 
					{ 
						$DiscussionCategory = $DiscussionCategorys[$i];?>
						<tr><td><a href="discussion_search.php?Category=<?php echo $DiscussionCategory->getID(); ?>" onclick="return; "> <?php echo $DiscussionCategory->getName() ?> </a></td>
						</tr>
					<?php
					}
				}

				?>
		</table>
	</div>

</div>
</div>