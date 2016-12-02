<?php
$servername = "localhost";
$username = "root";
$password = "root";
$databaseName="user_profile";
// Create connection
$connection = mysql_connect($servername, $username, $password);

// Check connection
if (!$connection) {
    echo "error";
    echo "Connection failed: " . mysql_connect_error()."<br />";
}
echo "Connected successfully"."<br />";

// Create database
$createQuery = 'CREATE Database if not exists '.$databaseName;
   $result = mysql_query( $createQuery);
   if(! $result ) {
      echo "Could not create database:". mysql_error()."<br />";
   }
   echo "Database created successfully"."<br />";
mysql_select_db($databaseName,$connection);
?>