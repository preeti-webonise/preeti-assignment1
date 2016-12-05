<!DOCTYPE html>
<html>
<head><title>Book details Page</title></head>
<body>
		
<?php 
	require_once 'Dollar.php';
	require_once 'Pound.php';
	require_once 'PostgreSqlConnection.php';
	$bookName    = $_GET['bookname'];
	$book 	     = $bookName . '.txt' ;
	$file        = fopen('Books/' . $book , 'r');
	$bookContent = file_get_contents('Books/' . $book);
	echo "Book Name: " . $bookName;
	echo "<br />";
	echo "Book Description: " . $bookContent;
	echo "<br />";
	try {
		$dbConnection = new PostgreSqlConnection;
		$database     = $dbConnection->connectDB();
		$selectQuery  = "SELECT price_inr FROM books WHERE book_name = '" . $bookName . "'"; 
		$statement    = $database->prepare($selectQuery);
		$statement->execute();
		$result       = $statement->fetchAll();
		$temp         = $result[0];
		$indianPrice  = $temp['price_inr'];
		$pound        = new Pound($indianPrice);
		$dollar       = new Dollar($indianPrice);
		$USPrice      = $pound->findPrice();
		$UKPrice      = $dollar->findPrice();
		echo "Book Price In Rupees : RS" . $indianPrice . "<br />";
	    echo "Book Price In Dollar : $" . $USPrice . "<br />";
	    echo "Book Price In Pounds : £" . $UKPrice . "<br />";
	}catch (Exception $e) {
    	echo 'Caught exception: ' ,  $e->getMessage() , "\n";
    }
?>

<form method = "post" action = "placeOrder.php">
	Select Quantity:<input type = "number"   name = "quantity">
	<p>Choose Payment Currency:</p>
	Indian Rupee:   <input type = "checkbox" name = "IndianRupee" id = "IndianRupee">
	US Dollars:     <input type = "checkbox" name = "USDollar"    id = "USDollar">
	UK Pounds:      <input type = "checkbox" name = "UKPound"     id = "UKPound"><br />
	
	<input type = "hidden" name = "bookname"    value = "<?php echo $bookName?>">
	<input type = "hidden" name = "indianprice" value = "<?php echo $indianPrice?>">
	<input type = "hidden" name = "USprice"     value = "<?php echo $USPrice?>">
	<input type = "hidden" name = "UKprice"     value = "<?php echo $UKPrice?>">
	
	<input type="submit" value="Buy Book">
</form>
</body>
</html>

