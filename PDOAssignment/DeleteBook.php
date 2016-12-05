<?php 
	session_start();
	include 'DatabaseConfig.php';
	$bookName=$_GET['bookName'];
	$book = $bookName.'.txt';
	unlink($book);
	$deleteStatement = "DELETE FROM books WHERE book_name = '".$bookName."'";
	$statement = $databaseConnection->prepare($deleteStatement);
	$statement->execute();
	@header("Location:UserPage.php");
?>
