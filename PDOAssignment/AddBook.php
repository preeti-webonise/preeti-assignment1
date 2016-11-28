<?php
	include 'DatabaseConfig.php';
	session_start();
	if(!$databaseConnection)
	{
		die("Connection Failed");
	}
	else
	{
		$bookName=$_POST['bookName'];
		$bookContents=$_POST['writeBookArea'];
		$book = fopen($bookName.".txt", "w");
		fwrite($book, $bookContents);
		$insertStatement = "INSERT INTO books(user_email,book_name) VALUES(:username,:bookname)";
		$preparedStatement = $databaseConnection->prepare($insertStatement);
		$preparedStatement->execute(array(':username' => $_SESSION['userName'],':bookname' => $bookName));
		if($preparedStatement)
		{
    			@header("Location:UserPage.php");
		}
	}
	
?>
