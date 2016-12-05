<?php 
require_once 'PostgreSqlConnection.php';
	$inputQuantity=$_POST['quantity'];
	$bookName=$_POST['bookname'];
	try{
		$dbConnection=new PostgreSqlConnection;
		$database=$dbConnection->connectDB();
		$selectQuery= "SELECT quantity FROM books WHERE book_name='".$bookName."'"; 
		$statement = $database->prepare($selectQuery);
		$statement->execute();
		$result = $statement->fetchAll();
		$dbQuantity=$result['quantity'];
		if(isset($_POST['IndianRupee'])
			$netPrice=$_POST['indianPrice'];
		elseif(isset($_POST['USDollar'])
			$netPrice=$_POST['USPrice'];
		elseif(isset($_POST['UKPrice'])
			$netPrice=$_POST['UKPrice'];	
		$order=new Orders($inputQuantity,$dbQuantity,$netPrice,$bookName);
		$order->generateOrder();		
		
	    	}catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
?>

