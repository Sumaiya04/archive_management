<?php

include_once 'blade/view.login.blade.php';
include_once COMMON.'class.common.php';

?>

<div id="form" class="container">
  
  <div class="panel panel-default myPanel">

      <div class="panel-heading" style="background-color: rgba(0,102,106,0.66); color: white">
          <strong style="font-size: large"><img src="./resources/img/login.png" alt="Icon" class="myImg">
              <?php echo ' '.LangUtil::get('login_member_login'); ?></strong></div>
    
    <div class="panel-body">
  
        <form method="post" class="form-horizontal">

            <div class="form-group" style="padding-top: 30px">
              <label class="control-label col-sm-3" for="txtEmail">
              <?php echo LangUtil::get('login_email'); ?>:
              </label>
              <div class="col-sm-8">
                    <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="<?php echo LangUtil::get('login_enter_email'); ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="txtPassword">
              <?php echo LangUtil::get('login_password'); ?>:
              </label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="<?php echo LangUtil::get('login_enter_password'); ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-6">
                <a href="<?php echo PageUtil::$USER_NEW; ?>">Register as a new user</a>
              </div>
              <div class="col-sm-4">  
                <a href="<?php echo PageUtil::$USER_FORGOT_PASSWORD; ?>">Forgot password</a>
              </div>
            </div>

            <div class="form-group" style="padding-top: 20px">
              <div class="col-sm-offset-3 col-sm-8">
                <button type="submit" name="login" value="login" class="btn btn-primary"><?php echo LangUtil::get('login_submit'); ?></button>
              </div>
            </div>                

        </form>

    </div>

 </div>
    
</div>    
