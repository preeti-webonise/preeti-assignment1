<?php
include "../../config/app.php";
include "AppModel.php";
class UsersTable extends AppModel{

	public function add($userDetails){
		$userName=$userDetails['username'];
		$password=$userDetails['password'];
		$profileId=$userDetails['profileid'];	
		$insertQuery="insert into users(username,password,profile_id) values('".$userName."','".$password."',".$profileId.")";
		if(mysql_query($insertQuery))
			return true;
		else 
			return false;
	}

	public function login($userDetails){
		$userName=$userDetails['username'];
		$password=$userDetails['password'];
		$selectQuery="select * from users where username='".$userName."' AND password='".$password."'";
		if(mysql_query($selectQuery)){
			$userDetails=mysql_query($selectQuery);
			if(!empty($userDetails))
				return true;
			else
				return false;
			}
	}

	public function edit($userDetails){
		$userName=$userDetails['username'];
		$oldPassword=$userDetails['oldpassword'];
		$newPassword=$userDetails['newpassword'];
		$selectQuery="select * from users where username='".$userName."' AND password='".$oldPassword."'";
		if(mysql_query($selectQuery)){
			$query=mysql_query($selectQuery);
			$changePasswordsDetails=mysql_fetch_row($query);
			if(!empty($changePasswordsDetails))
				$updateQuery="update users set password='".$newPassword."' where username='".$changePasswordsDetails[1]."'";
				if(mysql_query($updateQuery)){
					if(mysql_affected_rows()>0)
						return true;
					else
						return false;
				}else
				echo mysql_error();
			}else
			echo mysql_error();
	}

	public function delete($userDetails){
		$userName=$userDetails['username'];
		$password=$userDetails['password'];
	
		$selectQuery="select * from users where username='".$userName."' AND password='".$password."'";

		if(mysql_query($selectQuery)){
			$userDetails=mysql_query($selectQuery);
			if(!empty($userDetails)){
				$deleteQuery="delete from users where username='".$userName."' AND password='".$password."'";
					if(mysql_query($deleteQuery)){
						if(mysql_affected_rows()>0)
						return true;
					}else
						return false;			}
		}else
			echo mysql_error();
	}
}
?>