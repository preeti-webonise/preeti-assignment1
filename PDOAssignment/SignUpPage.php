<?php
	include 'DatabaseConfig.php';
	if(!$databaseConnection)
	{
		die("Connection Failed");
	}
	else
	{
		$userName=$_POST['emailId'];
		$password=$_POST['password'];
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];	
		$insertQuery = "INSERT INTO users(email,first_name,last_name,password) VALUES(:username,:firstname,:lastname,:password)";
		$preparedStatement = $databaseConnection->prepare($insertQuery);
		$preparedStatement->execute(array(':username' => $userName, ':firstname' => $firstName,':lastname'=>$lastName,':password' => $password));
		if($preparedStatement)
		{
			@header("location:LoginPage.html");
		}
	}
?>

