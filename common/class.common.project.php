<?php

class Project{
    private $_projectId;
    private $_projectThumbnail;
    private $_projectTitle;
    private $_projectDescription;
    private $_projectPDFLink;
    private $_projectLanguage;
    private $_projectYearId;
    private $_projectTermId;
    private $_projectCourseId;
    private $_projectDisciplineId;
    private $_projectTeacherId;
    private $_projectCreatedAt;
    private $_projectUpdatedAt;

    //Id
    public function getProjectId(){
        return $this->_projectId;
    }
    public function setProjectId($projectId){
        $this->_projectId=$projectId;
    }

    //Thumbnail
    public function getProjectThumbnail(){
        return $this->_projectThumbnail;
    }
    
    public function setProjectThumbnail($projectThumbnail){
        $this->_projectThumbnail=$projectThumbnail;
    } 
    
    
    //Title
    public function getProjectTitle(){
        return $this->_projectTitle;
    }

    public function setProjectTitle($projectTitle){
        $this->_projectTitle=$projectTitle;
    }

    //Description
    public function getProjectDescription(){
        return $this->_projectDescription;
    }

    public function setProjectDescription($projectDescription){
        $this->_projectDescription=$projectDescription;
    }

     //Link
    public function getProjectPDFLink()
    {
        return $this->_projectPDFLink;
    }
    public function setProjectPDFLink($projectPDFLink)
    {
        $this->_projectPDFLink=$projectPDFLink;
    }

    //Language
    public function getProjectLanguage(){
        return $this->_projectLanguage;
    }

    public function setProjectLanguage($projectLanguage){
        $this->_projectLanguage=$projectLanguage;
    }

    //YearID
    public function getProjectYearId(){
        return $this->_projectYearId;
    }

    public function setProjectYearId($projectYearId){
        $this->_projectYearId=$projectYearId;
    }

    //TermID
    public function getProjectTermId(){
        return $this->_projectTermId;
    }

    public function setProjectTermId($projectTermId){
        $this->_projectTermId=$projectTermId;
    }

    //CourseId
    public function getProjectCourseId(){
        return $this->_projectCourseId;
    }

    public function setProjectCourseId($projectCourseId){
        $this->_projectCourseId=$projectCourseId;
    }

    //DisciplineId
    public function getProjectDisciplineId(){
        return $this->_projectDisciplineId;
    }

    public function setProjectDisciplineId($projectDisciplineId){
        $this->_projectDisciplineId=$projectDisciplineId;
    }

    //Teacher
    public function getProjectTeacherId(){
        return $this->_projectTeacherId;
    }

    public function setProjectTeacherId($projectTeacherId){
        $this->_projectTeacherId=$projectTeacherId;
    }

    //Created At
    public function getProjectCreatedAt(){
        return $this->_projectCreatedAt;
    }

    public function setProjectCreatedAt($projectCreatedAt){
        $this->_projectCreatedAt=$projectCreatedAt;
    }

    //Updated At
    public function getProjectUpdatedAt(){
        return $this->_projectUpdatedAt;
    }

    public function setProjectUpdatedAt($projectUpdatedAt){
        $this->_projectUpdatedAt=$projectUpdatedAt;
    }
}

class Year{
    private $_yearId;
    private $_yearName;

    //YearId
    public function getYearId(){
        return $this->_yearId;
    }
    public function setYearId($yearId){
        $this->_yearId=$yearId;
    }

    //YearName
    public function getYearName(){
        return $this->_yearName;
    }
    public function setYearName($yearName){
        $this->_yearName=$yearName;
    }
}

class Term{
    private $_termId;
    private $_termName;

    //TermId
    public function getTermId(){
        return $this->_termId;
    }
    public function setTermId($termId){
        $this->_termId=$termId;
    }

    //TermName
    public function getTermName(){
        return $this->_termName;
    }
    public function setTermName($termName){
        $this->_termName=$termName;
    }
}

class Course{
    private $_courseId;
    private $_courseNo;
    private $_courseTitle;
    private $_courseCredit;
    private $_courseTypeId;
    private $_courseDisciplineId;
    private $_courseIsDeleted;

    //CourseId
    public function getCourseId(){
        return $this->_courseId;
    }
    public function setCourseId($courseId){
        $this->_courseId=$courseId;
    }

    //Course No
    public function getCourseNo(){
        return $this->_courseNo;
    }

    public function setCourseNo($courseNo){
        $this->_courseNo=$courseNo;
    }

    //Course Title
    public function getCourseTitle(){
        return $this->_courseTitle;
    }

    public function setCourseTitle($courseTitle){
        $this->_courseTitle=$courseTitle;
    }

    //Course Credit
    public function getCourseCredit(){
        return $this->_courseCredit;
    }

    public function setCourseCredit($courseCredit){
        $this->_courseCredit=$courseCredit;
    }

    //Course Type Id
    public function getCourseTypeId(){
        return $this->_courseTypeId;
    }

    public function setCourseTypeId($courseTypeId){
        $this->_courseTypeId=$courseTypeId;
    }

    //Course Discipline Id
    public function getCourseDisciplineId(){
        return $this->_courseDisciplineId;
    }

    public function setCourseDisciplineId($courseDisciplineId){
        $this->_courseDisciplineId=$courseDisciplineId;
    }

    //Course IsDeleted
    public function getCourseIsDeleted(){
        return $this->_courseIsDeleted;
    }

    public function setCourseIsDeleted($courseIsDeleted){
        $this->_courseIsDeleted=$courseIsDeleted;
    }
}

class StudentProject{
    private $_studentProjectId;
    private $_studentId;
    private $_projectId;
    private $_contribution;

    //StudentProjectId
    public function getStudentProjectId(){
        return $this->_studentProjectId;
    }
    public function setStudentProjectId($studentProjectId){
        $this->_studentProjectId=$studentProjectId;
    }

    //UserId
    public function getStudentId(){
        return $this->_studentId;
    }
    public function setStudentId($studentId){
        $this->_studentId=$studentId;
    }

    //ProjectId
    public function getProjectId(){
        return $this->_projectId;
    }
    public function setProjectId($projectId){
        $this->_projectId=$projectId;
    }

    //Contribution
    public function getContribution(){
        return $this->_contribution;
    }

    public function setContribution($contribution){
        $this->_contribution=$contribution;
    }

}
class LinkProject{
    private $_linkProjectId;
    private $_link;
    private $_projectId;

    //LinkProjectId
    public function getLinkProjectId(){
        return $this->_linkProjectId;
    }
    
    public function setLinkProjectId($linkProjectId){
        $this->_linkProjectId=$linkProjectId;
    }
    
    //Link
    public function getLink(){
        return $this->_link;
    }
    
    public function setLink($link){
        $this->_link=$link;
    }
    
    //ProjectId
    public function getProjectId(){
        return $this->_projectId;
    }
    
    public function setProjectId($projectId){
        $this->_projectId=$projectId;
    }
    
}
class Discipline{
    private $_disciplineId;
    private $_disciplineName;
    private $_disciplineShortCode;
    private $_disciplineSchoolId;
    
    //Id
    public function getDisciplineId(){
        return $this->_disciplineId;
    }
    
    public function setDisciplineId($disciplineId){
        $this->_disciplineId=$disciplineId;
    } 
    
    //Name
    public function getDisciplineName(){
        return $this->_disciplineName;
    }
    
    public function setDisciplineName($disciplineName){
        $this->_disciplineName=$disciplineName;
    } 
    
    //Short Code
    public function getDisciplineShortCode(){
        return $this->_disciplineShortCode;
    }
    
    public function setDisciplineShortCode($disciplineShortCode){
        $this->_disciplineShortCode=$disciplineShortCode;
    } 
    
    //School Id
    public function getDisciplineSchoolId(){
        return $this->_disciplineSchoolId;
    }
    
    public function setDisciplineSchoolId($disciplineSchoolId){
        $this->_disciplineSchoolId=$disciplineSchoolId;
    }
}

