<?php
	$dbHost="localhost";
	$dbUser="root";
	$dbPassword="root";
	$dbName="books_registry";
	try
	{
    	$databaseConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
    	$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
	catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }
?>
