<?php
	require_once  'AppModel.php';
	include_once '../../Config/database.php';
	class User extends AppModel
	{
		function index($username)
		{
			$userDetailsArray=array();
			if($userDetails = mysql_query("SELECT u.name,u.user_name,u.email,u.birth_date,p.profile_name FROM users u,profiles p WHERE u.profile_id = p.profile_id and u.user_name='".$username."'"))
            {
                $userDetailsArray=mysql_fetch_assoc($userDetails);
                return $userDetailsArray;
            }
            else
            {
                die("".mysql_error());
            }
        }
		function save($username,$userDetails)
		{
			$userUpdateArray=array();
			if($userUpdate=mysql_query("UPDATE users set name='".$userDetails[0]."', email='".$userDetails[1]."',birth_date='".$userDetails[2]."',profile_id='".$userDetails[3]."' where user_name='".$username."';"))
			{	
                return $userUpdateArray;	
			}
			else
			{
				// die("".mysql_error());
				echo "".mysql_error();
			}
		}
		function edit($username)
		{	
			$editDetailsArray=array();
			if($editDetails = mysql_query("SELECT u.name,u.email,u.birth_date,p.profile_name FROM users u,profiles p WHERE u.profile_id = p.profile_id and u.user_name='".$username."'"))
            {
                $editDetailsArray=mysql_fetch_assoc($editDetails);
                return $editDetailsArray;
            }
            else
            {
                die("".mysql_error());
            }
			
		}
		function delete($username)
		{
			$deleteDetails=mysql_query("DELETE FROM users where user_name='".$username."'");
			return $deleteDetails;
		}
	}
?>