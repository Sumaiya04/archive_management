<?php

include_once 'blade/view.home.blade.php';

?>



<div class="container col-sm-12" style="padding-top: 13vh">

<?php
			if(isset($globalMenu)){
				echo print_dashboard_body_tab($globalMenu);
			}


?>	        

</div>






