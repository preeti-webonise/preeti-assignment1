<?php
include "../../config/app.php";
include "AppModel.php";
class ProfilesTable extends AppModel{

	public function add($profileDetails){
		$insertQuery="insert ignore into profiles(profile_name) values('".$profileDetails[0]."')";
		if(mysql_query($insertQuery))
			return true;
		else 
			return false;
	}
	
	public function edit($changeProfile){
		$userName=$changeProfile['username'];
		$newProfile=$changeProfile['newprofile'];
		$selectQuery="select id from profiles where profile_name='".$newProfile."'";
		$query=mysql_query($selectQuery);
		$profileId = mysql_fetch_row($query);
		if($profileId){
		$updateQuery="update users set profile_id='".$profileId[0]."' where username='".$userName."'";
			if(mysql_query($updateQuery))
				return true;
			else
				echo mysql_error();
		}echo mysql_error();
	}

	public function delete($profileDetails){
		$deleteQuery="delete from profiles where profile_name='".$profileDetails[0]."'";
			if(mysql_query($deleteQuery))
				return true;
			else
				return false;
	}

	public function view($userName){
		$selectQuery="select profile_name from profiles,users where users.profile_id=profiles.id and 
		users.username='".$userName."'";
		$query=mysql_query($selectQuery);
		if(!empty($query)){
		    $userProfile=mysql_fetch_row($query);
			return $userProfile[0];
		}else
			return false;
	}
}
?>