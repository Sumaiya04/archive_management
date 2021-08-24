??????<?php

class Organisation{
    private $_organisationId;
    private $_organisationLogo;
    private $_organisationName;
    private $_organisationDescription;
    private $_organisationLink;
    private $_organisationMotto;
    private $_organisationCreatedAt;
    private $_organisationUpdatedAt;


    //Id
    public function getOrganisationId(){
        return $this->_organisationId;
    }
    public function setOrganisationId($organisationId){
        $this->_organisationId=$organisationId;
    }

    //Logo
    public function getOrganisationLogo(){
        return $this->_organisationLogo;
    }
    
    public function setOrganisationLogo($organisationLogo){
        $this->_organisationLogo=$organisationLogo;
    } 
    
    
    //Name
    public function getOrganisationName(){
        return $this->_organisationName;
    }

    public function setOrganisationName($organisationName){
        $this->_organisationName=$organisationName;
    }

    //Description
    public function getOrganisationDescription(){
        return $this->_organisationDescription;
    }

    public function setOrganisationDescription($organisationDescription){
        $this->_organisationDescription=$organisationDescription;
    }

     //Link
    public function getOrganisationLink()
    {
        return $this->_organisationLink;
    }
    public function setOrganisationLink($organisationLink)
    {
        $this->_organisationLink=$organisationLink;
    }

    //Motto
    public function getOrganisationMotto(){
        return $this->_organisationMotto;
    }

    public function setOrganisationMotto($organisationMotto){
        $this->_organisationMotto=$organisationMotto;
    }


    //Created At
    public function getOrganisationCreatedAt(){
        return $this->_organisationCreatedAt;
    }

    public function setOrganisationCreatedAt($organisationCreatedAt){
        $this->_organisationCreatedAt=$organisationCreatedAt;
    }

    //Updated At
    public function getOrganisationUpdatedAt(){
        return $this->_organisationUpdatedAt;
    }

    public function setOrganisationUpdatedAt($organisationUpdatedAt){
        $this->_organisationUpdatedAt=$organisationUpdatedAt;
    }
}

class Member{
    private $_memberId;
    private $_memberPhoto;
    private $_memberName;
    private $_memberAddress;
    private $_memberYearId;
    private $_memberBloodId;
    private $_memberPostId;
    private $_memberDisciplineId;
    private $_memberOrganisationId;
    private $_memberContact;


    //Id
    public function getMemberId(){
        return $this->_memberId;
    }
    public function setMemberId($memberId){
        $this->_memberId=$memberId;
    }

    //Photo
    public function getMemberPhoto(){
        return $this->_memberPhoto;
    }
    
    public function setMemberPhoto($memberPhoto){
        $this->_memberPhoto=$memberPhoto;
    } 
    
    
    //Name
    public function getMemberName(){
        return $this->_memberName;
    }

    public function setMemberName($memberName){
        $this->_memberName=$memberName;
    }

    //Address
    public function getMemberAddress(){
        return $this->_memberAddress;
    }

    public function setMemberAddress($memberAddress){
        $this->_memberAddress=$memberAddress;
    }

    //YearID
    public function getMemberYearId(){
        return $this->_memberYearId;
    }

    public function setMemberYearId($memberYearId){
        $this->_memberYearId=$memberYearId;
    }

    //BloodID
    public function getMemberBloodId(){
        return $this->_memberBloodId;
    }

    public function setMemberBloodId($memberBloodId){
        $this->_memberBloodId=$memberBloodId;
    }

    //PostId
    public function getMemberPostId(){
        return $this->_memberPostId;
    }

    public function setMemberPostId($memberPostId){
        $this->_memberPostId=$memberPostId;
    }

    //DisciplineId
    public function getMemberDisciplineId(){
        return $this->_memberDisciplineId;
    }

    public function setMemberDisciplineId($memberDisciplineId){
        $this->_memberDisciplineId=$memberDisciplineId;
    }

    //OrganisationId
    public function getMemberOrganisationId(){
        return $this->_memberOrganisationId;
    }

    public function setMemberOrganisationId($memberOrganisationId){
        $this->_memberOrganisationId=$memberOrganisationId;
    }

     //Contact
     public function getMemberContact(){
        return $this->_memberContact;
    }
    
    public function setMemberContact($memberContact){
        $this->_memberContact=$memberContact;
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

class Post{
    private $_postId;
    private $_postName;

    //PostId
    public function getPostId(){
        return $this->_postId;
    }
    public function setPostId($postId){
        $this->_postId=$postId;
    }

    //PostName
    public function getPostName(){
        return $this->_postName;
    }
    public function setPostName($postName){
        $this->_postName=$postName;
    }
}

class Blood{
    private $_bloodId;
    private $_bloodName;

    //BloodId
    public function getBloodId(){
        return $this->_bloodId;
    }
    public function setBloodId($bloodId){
        $this->_bloodId=$bloodId;
    }

    //BloodName
    public function getBloodName(){
        return $this->_bloodName;
    }
    public function setBloodName($bloodName){
        $this->_bloodName=$bloodName;
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