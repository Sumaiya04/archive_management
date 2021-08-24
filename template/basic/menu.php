<?php
include_once MODULES_USER.'bao/class.userbao.php';
//menu based on the permission value from the globaluser variable

$globalUser='';
$globalPermission='';
$globalMenu ='';
$globalPage ='';
$logoutMenu='';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//if there is one logged in user
if (isset($_SESSION["globalUser"])){
	//retreving the logged user from the session 
	$globalUser = $_SESSION["globalUser"];


	if (isset($_SESSION["globalPermission"])){	
		//retreiveing the permission of the user from the session
		$globalPermission = $_SESSION["globalPermission"]; 
	}

	if (isset($_SESSION["globalMenu"])){	
		//retreving the total menu setup of the sysetm that is initiated
		$globalMenu =  $_SESSION["globalMenu"];
	  	
	}

	// generating logout menu part
	//$logoutMenu = build_top_logout_menu($globalUser);

}

if (isset($_SESSION["globalPage"])){	
	//retreving the current page
	$globalPage =  $_SESSION["globalPage"];
  	
}

//print the top menu
if(isset($_SESSION['login.php'])) {
    if(isset($globalMenu)) {
        ?>
        <div class="row">
            <div class="affix-sidebar">
                <div class="sidebar-nav">
                    <div class="navbar navbar-default myNav" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <span class="visible-xs navbar-brand">Sidebar menu</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <!-- Menu -->
                            <ul class="nav navbar-nav" style="min-height: 93vh" id="sidenav01">
                                <br>
                                <li style="margin-top: 8vh">
                                    <a href="<?php echo PageUtil::$USER_DETAILS; ?>" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed">
                                        <?php
                                        $_UserBAO = new UserBAO();
                                        $globalUser=$_SESSION['globalUser'];
                                        $userDetails = $_UserBAO->readUserDetails($globalUser)->getResultObject();
                                        ?>
                                        <img class="img-rounded" src="<?php
                                        if (!empty($userDetails->getImage())){
                                            echo $userDetails->getImage();
                                        }else{
                                            echo './resources/img/avatar.png';
                                        }
                                        ?>" alt="Avater" height="100px" width="100px" >
                                        <h4 style="color: black">
                                            <b>
                                                <?php $globalUser=$_SESSION['globalUser'];
                                                echo $globalUser->getFirstName().' '.$globalUser->getLastName();
                                                ?>
                                            </b>
                                        </h4>
                                    </a>
                                </li>
                                <br>
                                <?php
                                for ($i = 0; $i < sizeof($globalMenu); $i++) {

                                    // if the first layer is visible then go inside -- build table row by row for the category
                                    if ($globalMenu[$i]->isVisible()) {
                                        ?>
                                        <li class="dropdown"><a href="#" title="<?php echo $globalMenu[$i]->getTitle();?>" class="dropdown-toggle disabled" data-toggle="dropdown">
                                                <?php echo $globalMenu[$i]->getTitle();?><span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <?php
                                                for ($j = 0; $j < sizeof($globalMenu[$i]->_Child); $j++) {

                                                    //if the second layer is visible go inside -- build table row by row
                                                    if ($globalMenu[$i]->_Child[$j]->isVisible()) {

                                                        if (sizeof($globalMenu[$i]->_Child[$j]->_Child) > 0) {
                                                            ?>
                                                            <li class="dropdown-submenu">
                                                                <a href="#" tabindex="-1" class="dropdown-toggle"
                                                                   data-toggle="dropdown"><?php echo $globalMenu[$i]->_Child[$j]->getTitle();?></a>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <?php
                                                                    for ($k = 0; $k < sizeof($globalMenu[$i]->_Child[$j]->_Child); $k++) {

                                                                        //if the third layer is visible -- build table column by column
                                                                        if ($globalMenu[$i]->_Child[$j]->_Child[$k]->isVisible()) {
                                                                            ?>
                                                                            <li>
                                                                                <a href="<?php echo $globalMenu[$i]->_Child[$j]->_Child[$k]->getLink(); ?>"><?php echo $globalMenu[$i]->_Child[$j]->_Child[$k]->getTitle(); ?></a>
                                                                            </li>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </li><!--end submenu-->
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <li>
                                                                <a href="#"><?php echo $globalMenu[$i]->_Child[$j]->getTitle() ?></a>
                                                            </li>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <br>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
