<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="userdb";

$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (mysqli_connect_errno()) {
	die("database connection failed");
}
else{
	//echo("connection successful");
}
?>