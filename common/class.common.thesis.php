<?php
class Thesis{
	private $_thesisId;
	private $_thesisThumbnail;
	private $_thesisTitle;
	private $_thesisDescription;
	private $_thesisPDFLink;
	private $_thesisYearId;
	private $_thesisTermId;
	private $_thesisCourseId;
	private $_thesisDisciplineId;
	private $_thesisCreatedAt;
	private $_thesisUpdatedAt;

	//Id
    public function getThesisId()
    {
        return $this->_thesisId;
    }
    public function setThesisId($thesisId)
    {
        $this->_thesisId = $thesisId;
    }

    //Thumbnail
    public function getThesisThumbnail()
    {
        return $this->_thesisThumbnail;
    }
    public function setThesisThumbnail($thesisThumbnail)
    {
        $this->_thesisThumbnail = $thesisThumbnail;
    }

    //Title
    public function getThesisTitle()
    {
    	return $this->_thesisTitle;
    }
    public function setThesisTitle($thesisTitle)
    {
    	$this->_thesisTitle=$thesisTitle;
    }

    //Description
    public function getThesisDescription()
    {
    	return $this->_thesisDescription;
    }
    public function setThesisDescription($thesisDescription)
    {
    	$this->_thesisDescription=$thesisDescription;
    }

    //Link
    public function getThesisPDFLink()
    {
    	return $this->_thesisPDFLink;
    }
    public function setThesisPDFLink($thesisPDFLink)
    {
    	$this->_thesisPDFLink=$thesisPDFLink;
    }

    //YearID
    public function getThesisYearId()
    {
    	return $this->_thesisYearId;
    }
    public function setThesisYearId($thesisYearId)
    {
    	$this->_thesisYearId=$thesisYearId;
    }

    //TermID
    public function getThesisTermId()
    {
    	return $this->_thesisTermId;
    }
    public function setThesisTermId($thesisTermId)
    {
    	$this->_thesisTermId=$thesisTermId;
    }

    //CourseId
    public function getThesisCourseId()
    {
    	return $this->_thesisCourseId;
    }
    public function setThesisCourseId($thesisCourseId)
    {
    	$this->_thesisCourseId=$thesisCourseId;
    }

    //DisciplineId
    public function getThesisDisciplineId()
    {
    	return $this->_thesisDisciplineId;
    }
    public function setThesisDisciplineId($thesisDisciplineId)
    {
    	$this->_thesisDisciplineId=$thesisDisciplineId;
    }

    //Created At
    public function getThesisCreatedAt()
    {
    	return $this->_thesisCreatedAt;
    }
    public function setThesisCreatedAt($thesisCreatedAt)
    {
    	$this->_thesisCreatedAt=$thesisCreatedAt;
    }

    //Updated At
    public function getThesisUpdatedAt()
    {
    	return $this->_thesisUpdatedAt;
    }
    public function setThesisUpdatedAt($thesisUpdatedAt)
    {
    	$this->_thesisUpdatedAt=$thesisUpdatedAt;
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

class StudentThesis{
	private $_studentThesisId;
	private $_studentId;
	private $_thesisId;
	private $_contribution;

	//StudentThesisId
	public function getStudentThesisId()
	{
		return $this->_studentThesisId;
	}
	public function setStudentThesisId($studentThesisId)
	{
		$this->_studentThesisId=$studentThesisId;
	}

	//StudentId
	public function getStudentId()
	{
		return $this->_studentId;
	}
	public function setStudentId($studentId)
	{
		$this->_studentId=$studentId;
	}

	//ThesisId
	public function getThesisId()
	{
		return $this->_thesisId;
	}
	public function setThesisId($thesisId)
	{
		$this->_thesisId=$thesisId;
	}

	//Contribution
    public function getContribution(){
        return $this->_contribution;
    }

    public function setContribution($contribution){
        $this->_contribution=$contribution;
    }

}

class SupervisorThesis{
	private $_supervisorThesisId;
	private $_supervisorId;
	private $_thesisId;

	//SupervisorThesisId
	public function getSupervisorThesisId()
	{
		return $this->_supervisorThesisId;
	}
	public function setSupervisorThesisId($supervisorThesisId)
	{
		$this->_supervisorThesisId=$supervisorThesisId;
	}

	//SupervisorId
	public function getSupervisorId()
	{
		return $this->_supervisorId;
	}
	public function setSupervisorId($supervisorId)
	{
		$this->_supervisorId=$supervisorId;
	}

	//ThesisId
	public function getThesisId()
	{
		return $this->_thesisId;
	}
	public function setThesisId($thesisId)
	{
		$this->_thesisId=$thesisId;
	}
}

class LinkThesis{
    private $_linkThesisId;
    private $_link;
    private $_thesis_id;

    public function getLinkThesisId(){
        return $this->_linkThesisId;
    }

    public function setLinkThesisId($linkThesisId){
        $this->_linkThesisId=$linkThesisId;
    }

    public function getLink(){
        return $this->_link;
    }

    public function setLink($link){
        $this->_link=$link;
    }

    public function getThesisId(){
        return $this->_thesis_id;
    }

    public function setThesisId($thesis_id){
        $this->_thesis_id=$thesis_id;
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
?>