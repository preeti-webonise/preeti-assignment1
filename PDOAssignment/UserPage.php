
<!DOCTYPE html>
<html>
<head>
	<title>UserHomePage</title>
</head>
<body>
	<h1>Welcome : <?php include 'DatabaseConfig.php';  session_start(); echo "".$_SESSION['userName'];?></h1>
	<hr>
	<form align="right" method="POST" action="Logout.php"><input type="submit" name="logOut" value="Log Out!!!"></form>
	
	<h2>Your Books : <br>
		<?php  
			$selectStatement= "SELECT book_name FROM books WHERE user_email = '".$_SESSION['userName']."'"; 
			$statement = $databaseConnection->prepare($selectStatement);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $key=>$value)
			{	
				foreach($value as $key1=>$value1)
				echo "<a href=ViewBook.php?bookName=".$value1.">".$value1."<br />";
			}
		?>
	<input type="button" name="createBook" value="Write New Book" onclick="document.location.href='CreateBook.php'">
		<br><br>
		
</body>
</html>	
