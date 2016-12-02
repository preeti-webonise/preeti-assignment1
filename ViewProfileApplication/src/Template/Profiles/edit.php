<?php
$userName=$_GET['username'];?>

<!DOCTYPE html>
<html>
<head><title>Profile edit page</title></head>
<body>
		<h2>WELCOME<?php echo $userName ?></h2>
		
		<form action="../../Controller/ProfilesController.php?username=<?php echo $userName?>" method="post">
		New Profile:<input type="text" name="newProfile">
		<input type="submit" name="editProfile" value="submit"> 
	    </form>

</body>
</html>


