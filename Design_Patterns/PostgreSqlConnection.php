<?php
include ("DBConnection.php");
class PostgreSqlConnection extends DBConnection{
	function connectDB(){
	    $dbHost='localhost';
            $dbName='books_shop';
            $dbUser='postgres';
            $dbPassword='root';
            try{
                $postgresqlConnection = new PDO("pgsql:host=$dbHost;dbname=$dbName;user=$dbUser;password=$dbPassword");
                $postgresqlConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $postgresqlConnection;
            }catch(PDOException $e){
                    echo "Connection failed: " . $e->getMessage();
            }     
	}
}
?>
