<!DOCTYPE html>
<html>
<head><title>User HomePage</title></head>
<body>
	<h1>Welcome : 
	<?php 
			include 'PostgreSqlConnection.php';
			session_start(); 
			if(isset($_SESSION["userName"])){
				echo "" . $_SESSION['userName'];
			}else{
				@header("Location:Login.html");
			}
		   ?></h1>
	<form align = "right" method = "POST" action = "Logout.php"><input type = "submit" name = "logOut" id = "logOut" value = "LogOut"></form>
	<hr>	
	<h2>Books Available:</h2><br> 
		<?php 
			try {
				$dbConnection = new PostgreSqlConnection;
				$database     = $dbConnection->connectDB();
				$selectQuery  = "SELECT book_name FROM books WHERE quantity>0"; 
				$statement    = $database->prepare($selectQuery);
				$statement->execute();
				$result       = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $key=>$value) {
					foreach($value as $key1=>$value1)
					echo "<a href = BookDetails.php?bookname=" . $value1 . ">" . $value1;
					echo "<br />"; 
				}
			}catch (Exception $e) {
    			echo 'Caught exception: ' , $e->getMessage() , "\n";
			}
		?>
</body>
</html>
