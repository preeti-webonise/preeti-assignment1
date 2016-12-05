<?php 
	require_once 'PostgreSqlConnection.php';
	require_once 'Orders.php';
	$inputQuantity = $_POST['quantity'];
	$bookName      = $_POST['bookname'];
	try{
		$dbConnection = new PostgreSqlConnection;
		$database     = $dbConnection->connectDB();
		$selectQuery  = "SELECT quantity FROM books WHERE book_name='" . $bookName . "'"; 
		$statement    = $database->prepare($selectQuery);
		$statement->execute();
		$result       = $statement->fetchAll();
		$temp         = $result[0];
		$dbQuantity   = $temp['quantity'];
		if(isset($_POST['IndianRupee'])) {
			$netPrice = $_POST['indianprice'];
			$currency = 'rupees';
		}elseif(isset($_POST['USDollar'])) {
			$netPrice = $_POST['USprice'];
			$currency = 'dollars';
		}elseif(isset($_POST['UKPound'])) {
			$netPrice = $_POST['UKprice'];
			$currency = 'pounds';
		}
		$order        = new Orders($inputQuantity , $dbQuantity , $netPrice , $bookName , $currency);
		$order->generateOrder();		
	}catch (Exception $e) {
    	echo 'Caught exception: ' , $e->getMessage() , "\n";
	}
?>
<!DOCTYPE html>
<html>
<head><title>ExitPage</title></head>
<body>
	<form method = "post" action = "HomePage.php">
		<input type = "submit" value="Explore More Books">
	</form>
</body>

