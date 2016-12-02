<?php
include "../Model/ProfilesTable.php";
include "AppController.php";
class ProfilesController extends AppController{
	public $profilesTable;
	public function __construct(){
		$this->profilesTable=new ProfilesTable;
	}

	public function add($profileDetails){
		$result=$this->profilesTable->add($profileDetails);
		if($result){
			$outputMessage= "profile added successfully";
			 @header("location:../Template/Profiles/displayResult.php?message=".$outputMessage."");
		}else{
			$outputMessage= "error in adding profile";
			@header("location:../Template/Profiles/displayResult.php?message=".$outputMessage."");
		}
	}

	public function edit($changeProfile){
		$result=$this->profilesTable->edit($changeProfile);
		if($result){
			$outputMessage="profile updated successfully";
			 @header("location:../Template/Profiles/displayResult.php?message=".$outputMessage."");
		}else{
			$outputMessage="error in updating profile";
		 	@header("location:../Template/Profiles/displayResult.php?message=".$outputMessage."");
		}
	}

	public function view($userName)
	{
		$userProfile=$this->profilesTable->view($userName);
		if($userProfile){
			$outputMessage= "Your Profile is \t".$userProfile;
			 @header("location:../Template/Profiles/displayResult.php?message=".$outputMessage."");
		}else{
			$outputMessage= "internal error";
			 @header("location:../Template/Profiles/displayResult.php?message=".$outputMessage."");
		}
	}

	public function delete($profileDetails){
		$result=$this->profilesTable->delete($profileDetails);
		if($result==true){
			$outputMessage= "profile deleted successfully";
		 	@header("location:../Template/Profiles/displayResult.php?message=".$outputMessage."");
		}else{
			$outputMessage= "error in deleting profile";
			 @header("location:../Template/Profiles/displayResult.php?message=".$outputMessage."");
		}
	}

}

$profilesController=new profilesController;
if(isset($_POST['addProfile'])){
		$profileDetails=array($_POST['profileName']);
		$profilesController->add($profileDetails);
}elseif(isset($_POST['editProfile'])){
		$changeProfile=array('username'=>$_GET['username'],'newprofile'=>$_POST['newProfile']);
		$profilesController->edit($changeProfile);
}elseif(isset($_POST['deleteProfile'])){
		$profileDetails=array($_POST['profileName']);
		$profilesController->delete($profileDetails);
}elseif(isset($_POST['viewProfile'])){
		$userName=$_GET['username'];
		$profilesController->view($userName);
}
?>