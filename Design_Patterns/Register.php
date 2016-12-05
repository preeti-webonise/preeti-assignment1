<?php
	include 'PostgreSqlConnection.php';
	$userName = $_POST['username'];
	$password = $_POST['password'];
	try{
		$dbConnection = new PostgreSqlConnection;
		$database     = $dbConnection->connectDB();
		$insertQuery  = "INSERT INTO users(username,password)VALUES('" . $userName . "','" . $password . "')";
	    $database->exec($insertQuery);
	    @header("Location:Login.html");	
	}catch (Exception $e) {
    	echo 'Caught exception: ' ,  $e->getMessage() , "\n";
	}
?>