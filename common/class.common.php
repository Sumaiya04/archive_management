<?php
include_once 'class.common.user.php';


/*All the common Model classes are listed here*/
class PermissionXML{
    var $id;  // id of permission
    var $name;    // name of permission
    var $category;  // category of permission
    
    //map the tag, value pair with the members serially
    //used in xml to permission mapping
    public function __construct($row) {

        //todo: check for the exception situation

        foreach ($row as $k=>$v)
            $this->$k = $row[$k];

    }

}

class MenuXML{
    private $_ParentTitle;
    public $_Child;
    private $_Title;
    private $_Permissions;
    private $_Link;
    private $_Visible=0; // by default every menu is in visible

    public function getTitle(){
        return $this->_Title;
    }

    public function setTitle($Title){
        $this->_Title = $Title;
    }


    public function getParentTitle(){
        return $this->_ParentTitle;
    }

    public function setParentTitle($ParentTitle){
        $this->_ParentTitle = $ParentTitle; 
    }

    public function getPermissions(){
        return $this->_Permissions;
    }

    public function setPermissions($Permissions){
        $this->_Permissions = $Permissions;
    }

    public function getLink(){
        return $this->_Link;
    }

    public function setLink($Link){
        $this->_Link = $Link;
    }

    public function setVisible($Visible){
        $this->_Visible = $Visible;
    }

    public function isVisible(){

        return $this->_Visible;
    }

}


class Result{

    private $_IsSuccess=0;
    private $_ResultObject;

    public function setIsSuccess($IsSuccess){
        $this->_IsSuccess = $IsSuccess;
    }

    public function getIsSuccess(){

        return $this->_IsSuccess;
    }

    public function setResultObject($ResultObject){
        $this->_ResultObject = $ResultObject;
    }

    public function getResultObject(){

        return $this->_ResultObject;
    }

}



class PermissionUtil{


    public static $DISCUSSION_C='DISCUSSION_C';
    public static $DISCUSSION_R='DISCUSSION_R';
    public static $DISCUSSION_U='DISCUSSION_U';
    public static $DISCUSSION_D='DISCUSSION_D';

    public static $DISCUSSION_CAT_C='DISCUSSION_CAT_C';
    public static $DISCUSSION_CAT_R='DISCUSSION_CAT_R';
    public static $DISCUSSION_CAT_U='DISCUSSION_CAT_U';
    public static $DISCUSSION_CAT_D='DISCUSSION_CAT_D';

    public static $DISCUSSION_COMMENT_C='DISCUSSION_COMMENT_C';
    public static $DISCUSSION_COMMENT_R='DISCUSSION_COMMENT_R';
    public static $DISCUSSION_COMMENT_U='DISCUSSION_COMMENT_U';
    public static $DISCUSSION_COMMENT_D='DISCUSSION_COMMENT_D';


    public static $HALL_C='HALL_C';
    public static $HALL_R='HALL_R';
    public static $HALL_U='HALL_U';
    public static $HALL_D='HALL_D';


    public static $POSITION_C='POSITION_C';
    public static $POSITION_R='POSITION_R';
    public static $POSITION_U='POSITION_U';
    public static $POSITION_D='POSITION_D';

    public static $ROLE_C='ROLE_C';
    public static $ROLE_R='ROLE_R';
    public static $ROLE_U='ROLE_U';
    public static $ROLE_D='ROLE_D';

    public static $SCHOOL_C='SCHOOL_C';
    public static $SCHOOL_R='SCHOOL_R';
    public static $SCHOOL_U='SCHOOL_U';
    public static $SCHOOL_D='SCHOOL_D';


    public static $USER_C='USER_C';
    public static $USER_R='USER_R';
    public static $USER_U='USER_U';
    public static $USER_D='USER_D';

    public static $DISCIPLINE_C='DISCIPLINE_C';
    public static $DISCIPLINE_R='DISCIPLINE_R';
    public static $DISCIPLINE_U='DISCIPLINE_U';
    public static $DISCIPLINE_D='DISCIPLINE_D';
   
    public static $PERMISSION_C='PERMISSION_C';
    public static $PERMISSION_R='PERMISSION_R';
    public static $PERMISSION_U='PERMISSION_U';
    public static $PERMISSION_D='PERMISSION_D';

    public static $PROJECT_C='PROJECT_C';
    public static $PROJECT_R='PROJECT_R';
    public static $PROJECT_U='PROJECT_U';
    public static $PROJECT_D='PROJECT_D';

    public static $YEAR_C='YEAR_C';
    public static $YEAR_R='YEAR_R';
    public static $YEAR_U='YEAR_U';
    public static $YEAR_D='YEAR_D';

    public static $TERM_C='TERM_C';
    public static $TERM_R='TERM_R';
    public static $TERM_U='TERM_U';
    public static $TERM_D='TERM_D';

    public static $COURSE_C='COURSE_C';
    public static $COURSE_R='COURSE_R';
    public static $COURSE_U='COURSE_U';
    public static $COURSE_D='COURSE_D';

    public static $THESIS_C='THESIS_C';
    public static $THESIS_R='THESIS_R';
    public static $THESIS_U='THESIS_U';
    public static $THESIS_D='THESIS_D';

    public static $PUBLICATION_C='PUBLICATION_C';
    public static $PUBLICATION_R='PUBLICATION_R';
    public static $PUBLICATION_U='PUBLICATION_U';
    public static $PUBLICATION_D='PUBLICATION_D';

    public static $ORGANISATION_C='ORGANISATION_C';
    public static $ORGANISATION_R='ORGANISATION_R';
    public static $ORGANISATION_U='ORGANISATION_U';
    public static $ORGANISATION_D='ORGANISATION_D';

    public static $EMAIL_C='EMAIL_C';
    public static $EMAIL_R='EMAIL_R';
    public static $EMAIL_U='EMAIL_U';
    public static $EMAIL_D='EMAIL_D';

    public static $ASSET_C='ASSET_C';
    public static $ASSET_R='ASSET_R';
    public static $ASSET_U='ASSET_U';
    public static $ASSET_D='ASSET_D';

}

class PageUtil{

    public static $DISCUSSION_CAT='discussion_category.php';
    public static $DISCUSSION='discussion.php';
    public static $DISCUSSION_COMMENT='discussion_comment.php';
    public static $DISCUSSION_SEARCH='discussion_search.php';
    public static $DISCUSSION_ANSWERED='discussion_answered.php';
    public static $DISCUSSION_UNANSWERED='discussion_unanswered.php';
    public static $DISCUSSION_LIST='discussion_list.php';
    public static $DISCUSSION_RECENT='discussion_recent.php';

    public static $HALL='hall.php';

    public static $ERROR='error.php';
    public static $HOME='home.php';
    public static $HOME_PAGE='home_page.php';
    public static $LOGIN='login.php';

    
    public static $PERMISSION='permission.php';
    public static $ROLE='role.php';
  
    public static $DISCIPLINE='discipline.php';
    public static $SCHOOL='school.php';
    public static $POSITION='position.php';



    public static $USER='user.php';
    public static $USER_NEW='user_new.php';
    public static $USER_DETAILS='user_details.php';
    public static $USER_SEARCH='user_search.php';
    public static $USER_FORGOT_PASSWORD='forgot_password.php';

    //Project Archive
    public static $PROJECT='project.php';
    public static $PROJECT_MEMBER='project_member.php';
    public static $PROJECT_HOME='project_home.php';
    public static $PROJECT_SEARCH='search_project.php';

    //Thesis Archive
    public static $THESIS='thesis.php';
    public static $THESIS_MEMBER='thesis_member.php';
    public static $THESIS_HOME='thesis_home.php';
    public static $THESIS_SEARCH='search_thesis.php';

    //Email Archive
    public static $EMAIL='email.php';
    public static $EMAIL_RENEW="email_renew.php";
    public static $EMAIL_EXPIRED="email_expired.php";

    //Organosation Archive
    public static $ORGANISATION='organisation.php';
    public static $ORGANISATION_MEMBER='organisation_member.php';
    public static $ORGANISATION_SEARCH='search_organisation.php';
    public static $MEMBER_FORM='member_form.php';


    //Asset Archive
    public static $ASSET='asset.php';
    public static $ASSET_REPAIR_SEND='asset_repair_send.php';
    public static $ASSET_REPAIR_RECEIVE='asset_repair_receive.php';
    public static $ASSET_DETAILS='asset_details.php';
    public static $ASSET_LEND='asset_lend.php';
    public static $ASSET_RETURN='asset_return.php';

     //Publication Archive
    public static $PUBLICATION='publication.php';
    public static $PUBLICATION_MEMBER='publication_member.php';
    public static $PUBLICATION_HOME='publication_home.php';
    public static $PUBLICATION_SEARCH='search_publication.php';
}

class RouteUtil{

    private static $s_Routes; //The single instance
    private static $s_instance; //The single instance


   private function __construct(){
        
         self::$s_Routes = array();

        //add new page and routing address here always

         self::$s_Routes[PageUtil::$DISCUSSION_CAT]  =  "modules/forum/ui/view.discussionCategory.php";
         self::$s_Routes[PageUtil::$DISCUSSION]      =  "modules/forum/ui/view.discussion.php";
         self::$s_Routes[PageUtil::$DISCUSSION_COMMENT] = "modules/forum/ui/view.comment.php";
         self::$s_Routes[PageUtil::$DISCUSSION_LIST]   = "modules/forum/ui/view.discussionList.php";
         self::$s_Routes[PageUtil::$DISCUSSION_SEARCH]   = "modules/forum/ui/view.searchDiscussion.php";
         self::$s_Routes[PageUtil::$DISCUSSION_RECENT]  = "modules/forum/ui/view.mostRecent.php";
         self::$s_Routes[PageUtil::$DISCUSSION_ANSWERED]  = "modules/forum/ui/view.answered.php";
         self::$s_Routes[PageUtil::$DISCUSSION_UNANSWERED]  = "modules/forum/ui/view.unanswered.php";


         self::$s_Routes[PageUtil::$HALL]  = "modules/hall/ui/view.hall.php";

         self::$s_Routes[PageUtil::$HOME] =   "modules/dashboard/ui/view.home.php";
       self::$s_Routes[PageUtil::$HOME_PAGE]="modules/dashboard/ui/view.homePage.php";
         self::$s_Routes[PageUtil::$LOGIN] =   "modules/dashboard/ui/view.login.php";

         self::$s_Routes[PageUtil::$ROLE]   =   "modules/user/ui/view.role.php";
         self::$s_Routes[PageUtil::$DISCIPLINE]       =   "modules/user/ui/view.discipline.php";  
         self::$s_Routes[PageUtil::$PERMISSION]       =   "modules/user/ui/view.permission.php";
         self::$s_Routes[PageUtil::$POSITION]         =   "modules/user/ui/view.position.php";
         self::$s_Routes[PageUtil::$SCHOOL]           =   "modules/user/ui/view.school.php";



         self::$s_Routes[PageUtil::$USER] =   "modules/user/ui/view.user.php";
         self::$s_Routes[PageUtil::$USER_DETAILS] =   "modules/user/ui/view.user_details.php";
         self::$s_Routes[PageUtil::$USER_NEW] =   "modules/user/ui/view.user_new.php";
         self::$s_Routes[PageUtil::$USER_SEARCH] =   "modules/user/ui/view.user_search.php";
         self::$s_Routes[PageUtil::$USER_FORGOT_PASSWORD] =   "modules/user/ui/view.forgot_password.php";

       //Project Archive Routes
       self::$s_Routes[PageUtil::$PROJECT]="modules/projectArchive/ui/view.project.php";
       self::$s_Routes[PageUtil::$PROJECT_MEMBER]="modules/projectArchive/ui/view.projectMember.php";
       self::$s_Routes[PageUtil::$PROJECT_HOME]="modules/projectArchive/ui/view.projectHome.php";
       self::$s_Routes[PageUtil::$PROJECT_SEARCH]="modules/projectArchive/ui/view.searchProject.php";

       //Thesis Archive Routes
       self::$s_Routes[PageUtil::$THESIS]="modules/thesisArchive/ui/view.thesis.php";
       self::$s_Routes[PageUtil::$THESIS_MEMBER]="modules/thesisArchive/ui/view.thesisMember.php";
       self::$s_Routes[PageUtil::$THESIS_HOME]="modules/thesisArchive/ui/view.thesisHome.php";
       self::$s_Routes[PageUtil::$THESIS_SEARCH]="modules/thesisArchive/ui/view.searchThesis.php";

        //Publication Archive Routes
       self::$s_Routes[PageUtil::$PUBLICATION]="modules/publication/ui/view.publication.php";
       self::$s_Routes[PageUtil::$PUBLICATION_MEMBER]="modules/publication/ui/view.publicationMember.php";
       self::$s_Routes[PageUtil::$PUBLICATION_HOME]="modules/publication/ui/view.publicationHome.php";
       self::$s_Routes[PageUtil::$PUBLICATION_SEARCH]="modules/publication/ui/view.searchPublication.php";


       //Email Archive Routes
       self::$s_Routes[PageUtil::$EMAIL]="modules/emailArchive/ui/view.email.php";
       self::$s_Routes[PageUtil::$EMAIL_RENEW]="modules/emailArchive/ui/view.emailRenew.php";
       self::$s_Routes[PageUtil::$EMAIL_EXPIRED]="modules/emailArchive/ui/view.emailExpired.php";

       //Organisation Archive Routes
       self::$s_Routes[PageUtil::$ORGANISATION]="modules/organisation/ui/view.organisation.php";
       self::$s_Routes[PageUtil::$ORGANISATION_MEMBER]="modules/organisation/ui/view.organisationMember.php";
       self::$s_Routes[PageUtil::$ORGANISATION_SEARCH]="modules/organisation/ui/view.searchOrganisation.php";
       self::$s_Routes[PageUtil::$MEMBER_FORM]="modules/organisation/ui/view.memberForm.php";

       //Asset Archive Routes
       self::$s_Routes[PageUtil::$ASSET]="modules/assetArchive/ui/view.asset.php";
       self::$s_Routes[PageUtil::$ASSET_REPAIR_SEND]="modules/assetArchive/ui/view.sendRepair.php";
       self::$s_Routes[PageUtil::$ASSET_REPAIR_RECEIVE]="modules/assetArchive/ui/view.receiveRepair.php";
       self::$s_Routes[PageUtil::$ASSET_DETAILS]="modules/assetArchive/ui/view.assetDetails.php";
       self::$s_Routes[PageUtil::$ASSET_LEND]="modules/assetArchive/ui/view.assetLend.php";
       self::$s_Routes[PageUtil::$ASSET_RETURN]="modules/assetArchive/ui/view.assetReturn.php";

       //the page not found will redirect to error page
         self::$s_Routes[PageUtil::$ERROR] = "modules/dashboard/ui/view.error.php";

      
    }

    public static function getInstance() {
        if(!self::$s_instance) { // If no instance then make one
            self::$s_instance = new self();
        }
        return self::$s_instance;
    }

    public static function get($Page){

        $Page = strtolower(trim($Page)); 

        if(array_key_exists($Page, self::$s_Routes)){
        
            return self::$s_Routes[$Page];
        }
        else{
        
            return self::$s_Routes[PageUtil::$ERROR]; 
        }
    }

}

class MiddlewareUtil{

    private static $s_Routes; //The single instance
    private static $s_instance; //The single instance


    private function __construct(){
        
         self::$s_Routes = array();

        //add which page should be successfully logged before getting to this page
        //example: login.php should be successfully logged in to get to home.php
         self::$s_Routes[PageUtil::$HOME]   =  PageUtil::$LOGIN ;

   
         self::$s_Routes[PageUtil::$USER]   =  PageUtil::$LOGIN ;
         self::$s_Routes[PageUtil::$USER_DETAILS]   =  PageUtil::$LOGIN ;

         self::$s_Routes[PageUtil::$HALL]   =  PageUtil::$LOGIN ;

         self::$s_Routes[PageUtil::$ROLE]   =  PageUtil::$LOGIN ;
         self::$s_Routes[PageUtil::$PERMISSION]   =  PageUtil::$LOGIN ;
         

         self::$s_Routes[PageUtil::$DISCIPLINE]   =  PageUtil::$LOGIN ;

         //Project Archive Middleware
        self::$s_Routes[PageUtil::$PROJECT] = PageUtil::$LOGIN;

        //Thesis Archive Middleware
        self::$s_Routes[PageUtil::$THESIS]=PageUtil::$LOGIN;

        //Publication Archive Middleware
        self::$s_Routes[PageUtil::$PUBLICATION]=PageUtil::$LOGIN;

        //Email Archive Middleware
        self::$s_Routes[PageUtil::$EMAIL]=PageUtil::$LOGIN;
        self::$s_Routes[PageUtil::$EMAIL_RENEW]=PageUtil::$LOGIN;
        self::$s_Routes[PageUtil::$EMAIL_EXPIRED]=PageUtil::$LOGIN;

        //Organisation Archive Middleware
        self::$s_Routes[PageUtil::$ORGANISATION] = PageUtil::$LOGIN;

        //Asset Archive Middleware
        self::$s_Routes[PageUtil::$ASSET]=PageUtil::$LOGIN;
        self::$s_Routes[PageUtil::$ASSET_REPAIR_SEND]=PageUtil::$LOGIN;
        self::$s_Routes[PageUtil::$ASSET_REPAIR_RECEIVE]=PageUtil::$LOGIN;
        self::$s_Routes[PageUtil::$ASSET_DETAILS]=PageUtil::$LOGIN;
        self::$s_Routes[PageUtil::$ASSET_LEND]=PageUtil::$LOGIN;
        self::$s_Routes[PageUtil::$ASSET_RETURN]=PageUtil::$LOGIN;
   
    }

    public static function getInstance() {
        if(!self::$s_instance) { // If no instance then make one
            self::$s_instance = new self();
        }
        return self::$s_instance;
    }

    private static function isAvailable($Page){

        $Page = strtolower(trim($Page)); 

        //if the page is refereneced in the middleware
        if(array_key_exists($Page, self::$s_Routes)){
            
            return true;
        }
        else{
        
            return false; 
        }
    }

    public static function get($Page){

        //if page is referenced
        if(self::isAvailable($Page)) {
            //start session and check whether the middleware is successfully crossed

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            // other send initial page: example if logged out then go to login.php page
            $ret = isset($_SESSION[self::$s_Routes[$Page]]) ? $Page : self::$s_Routes[$Page];
            return $ret;
        }
        else{
            //Permission for viewing page after login
            if(isset($_SESSION['login.php'])){
                if(!strcasecmp($Page,'index2.php')||empty($Page)){
                    return PageUtil::$HOME;
                }
                elseif (!strcasecmp($Page,'user_new.php')){
                    return PageUtil::$HOME;
                }
                elseif (!isset($_GET['logout'])&&!strcasecmp($Page,'login.php')){
                    return PageUtil::$HOME;
                }
                elseif (!strcasecmp($Page,'home_page.php')){
                    return PageUtil::$HOME;
                }
                else{
                    return $Page;
                }
            }
            else{
                //Permission for viewing page without login

                if(!strcasecmp($Page,'user_new.php')){
                    return PageUtil::$USER_NEW;
                }
                elseif (!strcasecmp($Page,'forgot_password.php')){
                    return PageUtil::$USER_FORGOT_PASSWORD;
                }
                elseif (!strcasecmp($Page,'project_home.php')){
                    return PageUtil::$PROJECT_HOME;
                }
                elseif (!strcasecmp($Page, 'thesis_home.php')) {
                    return PageUtil::$THESIS_HOME;   
                }
                elseif (!strcasecmp($Page, 'publication_home.php')) {
                    return PageUtil::$PUBLICATION_HOME;
                }
                elseif (!strcasecmp($Page,'home_page.php')){
                    return PageUtil::$HOME_PAGE;
                }
                elseif (!strcasecmp($Page,'project_member.php')){
                    return PageUtil::$PROJECT_MEMBER;
                }
                elseif (!strcasecmp($Page,'organisation_member.php')){
                    return PageUtil::$ORGANISATION_MEMBER;
                }
                elseif (!strcasecmp($Page, 'thesis_member.php')) {
                    return PageUtil::$THESIS_MEMBER;
                }
                elseif (!strcasecmp($Page, 'publication_member.php')) {
                    return PageUtil::$PUBLICATION_MEMBER;
                }
                elseif (!strcasecmp($Page,'search_project.php')){
                    return PageUtil::$PROJECT_SEARCH;
                }
                elseif (!strcasecmp($Page, 'search_thesis.php')) {
                    return PageUtil::$THESIS_SEARCH;
                }
                elseif (!strcasecmp($Page, 'search_publication.php')) {
                    return PageUtil::$PUBLICATION_SEARCH;
                }
                elseif (!strcasecmp($Page,'search_organisation.php')){
                    return PageUtil::$ORGANISATION_SEARCH;
                }
                elseif (empty($Page)){
                    return PageUtil::$HOME_PAGE;
                }
                else{
                    return PageUtil::$LOGIN;
                }
            }
        }
    }
}

//finding different partse of an url
    function unparse_url($parsed_url) { 
        $scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : ''; 
        $host     = isset($parsed_url['host']) ? $parsed_url['host'] : ''; 
        $port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : ''; 
        $user     = isset($parsed_url['user']) ? $parsed_url['user'] : ''; 
        $pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : ''; 
        $pass     = ($user || $pass) ? "$pass@" : ''; 
        $path     = isset($parsed_url['path']) ? $parsed_url['path'] : ''; 
        $query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : ''; 
        $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : ''; 

        //extracting the page name such as user.php from the url
        $page = substr($path, strrpos($path,'/')+1,strrpos($path,'.php')-strrpos($path,'/')+strlen('.php'));

        return $page;
        //return "$scheme$user$pass$host$port$path$query$fragment"; 
} 


//applying middleware such as login.php comes before home.php
    function apply_middleware($page) { 
     
        // checking whtether there is any middleware     
        $page=MiddlewareUtil::get($page);   

        return $page;
         
    }

//finding different partse of an url
    function apply_routing(&$page) { 
     
        //looking for the extracted page in the route list
        $page=RouteUtil::get($page);

        return true;
    }




MiddlewareUtil::getInstance();
RouteUtil::getInstance();

?>