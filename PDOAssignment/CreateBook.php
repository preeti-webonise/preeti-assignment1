<!DOCTYPE html>
<html>
<head>
	<title>Create New Book</title>
</head>
<body>
	<h1>Welcome : 
	<?php
		 include 'DatabaseConfig.php';
		 session_start(); echo "".$_SESSION['userName'];
	?>
	</h1>
	<hr>
	<form name="writeBook" method="POST" action="AddBook.php">
		Book Name : <br>
		<input type="text" name="bookName" required><br><br>
		Start Writing your book in the text area : <br>
		<textarea name="writeBookArea" rows="30" cols="100" ></textarea><br>
		<input type="submit" name="saveBook" value="Save Book">
	</form>
</body>
</html>
