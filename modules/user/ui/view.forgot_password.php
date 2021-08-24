<?php

include_once 'blade/view.forgot_password.blade.php';
include_once COMMON.'class.common.php';

?>

<div id="form" class="container">
  
  <div class="panel panel-default myPanel">

      <div class="panel-heading myHeading" style="background-color: rgba(0,102,106,0.66); color: white">
          <strong><img src="./resources/img/forgot-pw.png" alt="Icon" class="myImg">&nbsp;Forgot Password</strong></div>

      <div class="panel-body">
  
        <form method="post" class="form-horizontal">

            <div class="form-group">
              <label class="control-label col-sm-3" for="txtEmail">
              Email:
              </label>
              <div class="col-sm-8">
                    <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Enter Email" required>
              </div>
            </div>


            <div class="form-group" style="padding-top: 20px">
              <div class="col-sm-offset-3 col-sm-8">
                <button type="submit" name="request" value="request" class="btn btn-primary">Request Password</button>
              </div>
            </div>                

        </form>

    </div>

 </div>
    
</div>    
