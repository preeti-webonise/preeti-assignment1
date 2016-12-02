<?php
include "../Model/UsersTable.php";
include "AppController.php";
class UsersController extends AppController{
	public $usersTable;
	public function __construct(){
		$this->usersTable=new UsersTable;
	}

	public function login($userDetails){
		$userName=$userDetails['username'];
		$password=$userDetails['password'];
		$result=$this->usersTable->login($userDetails);
		if (!$result){
			$outputMessage='check your username or password';
		    @header("location:../Template/Users/displayResult.php?message=".$outputMessage."");
  		}else
            @header("location: ../Template/Profiles/userHomepage.php?username=".$userName."");
                  		
	}	

	public function add($userDetails){
		$result=$this->usersTable->add($userDetails);
		if($result){
			$outputMessage= 'user added successfully';
		    @header("location:../Template/Users/displayResult.php?message=".$outputMessage."");
		}else{
			$outputMessage= 'error in adding user';
		    @header("location:../Template/Users/displayResult.php?message=".$outputMessage."");
		}
	}

	public function edit($userDetails){
		$result=$this->usersTable->edit($userDetails);
		if($result){
			$outputMessage= 'password updated successfully';
		    @header("location:../Template/Users/displayResult.php?message=".$outputMessage."");
		}else{
			$outputMessage= 'error in updating user';
		    @header("location:../Template/Users/displayResult.php?message=".$outputMessage."");
		}
	}

	public function delete($userDetails){
		$result=$this->usersTable->delete($userDetails);
		if($result){
			$outputMessage='user deleted successfully';
		    @header("location:../Template/Users/displayResult.php?message=".$outputMessage."");
		}else{
			$outputMessage= 'user doesnot exist';
		    @header("location:../Template/Users/displayResult.php?message=".$outputMessage."");
		}
	}

}

$usersController=new UsersController;
if (isset($_POST['loginUser'])){
		$userDetails=array('username'=>$_POST['username'],'password'=>$_POST['password']);
		$usersController->login($userDetails);
}elseif(isset($_POST['addUser'])){
		$userDetails=array('username'=>$_POST['username'],'password'=>$_POST['password'],'profileid'=>$_POST['profileid']);
		$usersController->add($userDetails);
}elseif(isset($_POST['editUser'])){
		$userDetails=array('username'=>$_POST['username'],'oldpassword'=>$_POST['oldPassword'],'newpassword'=>$_POST['newPassword']);
		$usersController->edit($userDetails);
}elseif(isset($_POST['deleteUser'])){
		$userDetails=array('username'=>$_POST['username'],'password'=>$_POST['password']);
		$usersController->delete($userDetails);
}
?>