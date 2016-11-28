<?php
	include 'DatabaseConfig.php';
	if(!$databaseConnection)
	{
		echo "Connection Failed";
	}
	else
	{
		$flag="false";
		$userName=$_POST['emailId'];
		$password=$_POST['password'];
		$selectStatement= "SELECT * FROM users WHERE email = '".$userName."' and password='".$password."'"; 
		$statement = $databaseConnection->query($selectStatement);
		foreach($databaseConnection->query($selectStatement) as $row)
		{
    		 $flag="true";
		}
		if($flag=="true")
		{
			session_start();
			$_SESSION['userName']=$userName;
			@header("Location:UserPage.php");
		}	
		else
		{
			@header("Location:LoginPage.html");
		}
	}
	
?>
