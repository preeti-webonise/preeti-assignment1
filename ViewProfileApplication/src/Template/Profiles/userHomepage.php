<?php
$userName=$_GET['username'];?>

<!DOCTYPE html>
<html>
<head><title>User Homepage</title></head>
<body>
		<h2>WELCOME<?php echo"\t". $userName ?></h2>
		<hr />
		<form action="edit.php?username=<?php echo $userName?>" method="post">
		<input type="submit" value="Update Profile"> 
	    </form>

	    <form action="../../Controller/ProfilesController.php?username=<?php echo $userName?>" method="post">
	    <input type="submit" name="viewProfile" value="View Profile">
	    </form>

	    <form method="post" action="../Users/edit.html">
	    	<input type="submit" value="Edit password"></form>

	     <br><form method="post" action="../Users/delete.html">
	    	<input type="submit" value="Delete Your Account"></form>
</body>
</html>


