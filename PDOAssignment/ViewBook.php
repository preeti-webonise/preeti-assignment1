<!DOCTYPE html>
<html>
<head>
	<title>View Your Book</title>
</head>
<body>
	<h1>Welcome : 
	<?php 
		include 'DatabaseConfig.php';  
		session_start(); 
		echo "".$_SESSION['userName'];
	?></h1>
	<hr>
	<?php 
		if(!$databaseConnection)
		{
			die("Connection Failed");
		}
		else
		{
			$bookName=$_GET['bookName'];
			$book = $bookName.'.txt';
			$file = fopen($book, 'r');
			$bookContent=file_get_contents($book);
			echo "<textarea name='viewBookArea'rows='100' cols='100' >".$bookContent."</textarea><br>";
		}
	?>	
			
			<input type="button" name="editBook" value="Edit Book" onclick="document.location.href='EditBook.php?bookName=<?php echo $bookName?>'">
			<br><br>
			<input type="button" name="deleteBook" value="Delete Book" onclick="document.location.href='DeleteBook.php?bookName=<?php echo $bookName?>'">
</form>
</body>
</html>

    
