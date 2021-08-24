<?php
class Publication{
	private $_publicationId;
	private $_publicationThumbnail;
	private $_publicationTitle;
	private $_publicationDescription;
	private $_publicationPDFLink;
	private $_publicationYearId;
	private $_publicationTermId;
	private $_publicationCourseId;
	private $_publicationDisciplineId;
	private $_publicationCreatedAt;
	private $_publicationUpdatedAt;

	//Id
    public function getPublicationId()
    {
        return $this->_publicationId;
    }
    public function setPublicationId($publicationId)
    {
        $this->_publicationId = $publicationId;
    }

    //Thumbnail
    public function getPublicationThumbnail()
    {
        return $this->_publicationThumbnail;
    }
    public function setPublicationThumbnail($publicationThumbnail)
    {
        $this->_publicationThumbnail = $publicationThumbnail;
    }

    //Title
    public function getPublicationTitle()
    {
    	return $this->_publicationTitle;
    }
    public function setPublicationTitle($publicationTitle)
    {
    	$this->_publicationTitle=$publicationTitle;
    }

    //Description
    public function getPublicationDescription()
    {
    	return $this->_publicationDescription;
    }
    public function setPublicationDescription($publicationDescription)
    {
    	$this->_publicationDescription=$publicationDescription;
    }

    //Link
    public function getPublicationPDFLink()
    {
    	return $this->_publicationPDFLink;
    }
    public function setPublicationPDFLink($publicationPDFLink)
    {
    	$this->_publicationPDFLink=$publicationPDFLink;
    }

    //YearID
    public function getPublicationYearId()
    {
    	return $this->_publicationYearId;
    }
    public function setPublicationYearId($publicationYearId)
    {
    	$this->_publicationYearId=$publicationYearId;
    }

    //TermID
    public function getPublicationTermId()
    {
    	return $this->_publicationTermId;
    }
    public function setPublicationTermId($publicationTermId)
    {
    	$this->_publicationTermId=$publicationTermId;
    }

    //CourseId
    public function getPublicationCourseId()
    {
    	return $this->_publicationCourseId;
    }
    public function setPublicationCourseId($publicationCourseId)
    {
    	$this->_publicationCourseId=$publicationCourseId;
    }

    //DisciplineId
    public function getPublicationDisciplineId()
    {
    	return $this->_publicationDisciplineId;
    }
    public function setPublicationDisciplineId($publicationDisciplineId)
    {
    	$this->_publicationDisciplineId=$publicationDisciplineId;
    }

    //Created At
    public function getPublicationCreatedAt()
    {
    	return $this->_publicationCreatedAt;
    }
    public function setPublicationCreatedAt($publicationCreatedAt)
    {
    	$this->_publicationCreatedAt=$publicationCreatedAt;
    }

    //Updated At
    public function getPublicationUpdatedAt()
    {
    	return $this->_publicationUpdatedAt;
    }
    public function setPublicationUpdatedAt($publicationUpdatedAt)
    {
    	$this->_publicationUpdatedAt=$publicationUpdatedAt;
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


class StudentPublication{
	private $_studentPublicationId;
	private $_studentId;
	private $_publicationId;
	private $_contribution;

	//StudentPublicationId
	public function getStudentPublicationId()
	{
		return $this->_studentPublicationId;
	}
	public function setStudentPublicationId($studentPublicationId)
	{
		$this->_studentPublicationId=$studentPublicationId;
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

	//PublicationId
	public function getPublicationId()
	{
		return $this->_publicationId;
	}
	public function setPublicationId($publicationId)
	{
		$this->_publicationId=$publicationId;
	}

	//Contribution
    public function getContribution(){
        return $this->_contribution;
    }

    public function setContribution($contribution){
        $this->_contribution=$contribution;
    }

}

class SupervisorPublication{
	private $_supervisorPublicationId;
	private $_supervisorId;
	private $_publicationId;

	//SupervisorPublicationId
	public function getSupervisorPublicationId()
	{
		return $this->_supervisorPublicationId;
	}
	public function setSupervisorPublicationId($supervisorPublicationId)
	{
		$this->_supervisorPublicationId=$supervisorPublicationId;
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

	//PublicationId
	public function getPublicationId()
	{
		return $this->_publicationId;
	}
	public function setPublicationId($publicationId)
	{
		$this->_publicationId=$publicationId;
	}
}

class LinkPublication{
    private $_linkPublicationId;
    private $_link;
    private $_publication_id;

    public function getLinkPublicationId(){
        return $this->_linkPublicationId;
    }

    public function setLinkPublicationId($linkPublicationId){
        $this->_linkPublicationId=$linkPublicationId;
    }

    public function getLink(){
        return $this->_link;
    }

    public function setLink($link){
        $this->_link=$link;
    }

    public function getPublicationId(){
        return $this->_publication_id;
    }

    public function setPublicationId($publication_id){
        $this->_publication_id=$publication_id;
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