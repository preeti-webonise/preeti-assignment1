<?php
	include 'PostgreSqlConnection.php';
	$flag="false";
	$userName=$_POST['username'];
	$password=$_POST['password'];
	try{
		$dbConnection=new PostgreSqlConnection;
		$database=$dbConnection->connectDB();
		$selectQuery=$database->query( "SELECT * FROM users WHERE username = '".$userName."' and 					password='"$password."'",PDO::FETCH_ASSOC); 
		foreach($selectQuery as $row){
	    	$flag="true";
		}
		if($flag=="true"){
			session_start();
			$_SESSION['userName']=$userName;
			@header("Location:HomePage.php");
		}else{
			alert("invalid username/password.  Please try again");
			@header("Location:Login.html");
			}	
	}catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
?>
