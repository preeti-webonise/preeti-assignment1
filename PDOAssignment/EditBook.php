<!DOCTYPE html>
<html>
<head>
	<title>Edit Your Book</title>
</head>
<body>
	<h1>Welcome : 
	<?php 
		include 'DatabaseConfig.php';  
		session_start(); 
		echo "".$_SESSION['userName'];
	?></h1>
	<hr>
	<form name="editBook" method="POST" action="EditBook.php">
	<?php 
		if(isset($_POST['SaveBook'])){
			@header("Location:UserPage.php");
		}
		if(!$databaseConnection)
		{
			die("Connection Failed");
		}
		else
		{
			$bookName=$_GET['bookName'];
			$book = $bookName.'.txt';
			$file = fopen($book,'a');
			$bookContent=file_get_contents($bookName.'.txt');
			echo "<textarea name='txtAreaBook' rows='100' cols='100' >".$bookContent."</textarea><br>";
			fwrite($file, $bookContent);
			echo "<input type='submit' name='SaveBook' value='Save Book'>";
		}
		
	?>
</form>
</body>
</html>
