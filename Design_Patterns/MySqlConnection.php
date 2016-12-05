<?php
    include ("DBConnection.php");
    public class MySqlConnection extends DBConnection{
	   function connectDB() {
	        $dbHost     = "localhost";
            $dbUser     = "root";
            $dbPassword = "root";
            $dbName     = "books_shop";
            try {
                $mysqlConnection = new PDO("mysql:host=$dbHost;dbname=$dbName" , $dbUser, $dbPassword);
                $mysqlConnection->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                return $mysqlConnection;
            }catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }        
        }    
    }
?>


