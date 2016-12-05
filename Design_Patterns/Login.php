<?php
	include 'PostgreSqlConnection.php';
	$flag = "false";
	$userName = $_POST['username'];
	$password = $_POST['password'];
	try {
		$dbConnection = new PostgreSqlConnection;
		$database     = $dbConnection->connectDB();
		$selectQuery  = "SELECT * FROM users WHERE username = '" . $userName . "' and password='" . $password . "'"; 
		$statement    = $database->query($selectQuery); 
		foreach($database->query($selectQuery) as $row)
		{
			$flag = "true";
		}
		if($flag == "true") {
			session_start();
			$_SESSION['userName'] = $userName;
			@header("Location:HomePage.php");
		}else {
			echo "invalid username/password.  Please try again";
			}	
	}catch (Exception $e) {
    	echo 'Caught exception: ' , $e->getMessage() , "\n";
	}
?>
